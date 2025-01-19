<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $programModel;
    protected $donaturModel;

    public function __construct()
    {
        $this->programModel = new \App\Models\ModelProgram();
        $this->donaturModel = new \App\Models\ModelDonatur();
    }

    public function index()
    {
        $page = $this->request->getGet('page') ?? 1;

        $donaturModel = new \App\Models\ModelDonatur();

        $data = [
            'donasi_terbaru' => $donaturModel->getDonaturTerbaru($page),
            'total_donasi' => $donaturModel->getTotalDonasi(),
            'total_donatur' => $donaturModel->getTotalDonatur(),
            'total_program' => $this->programModel->getTotalProgramAktif(),
            'total_penyaluran' => $this->programModel->getTotalPenyaluran(),
            'pager' => [
                'total_records' => $donaturModel->countAllDonasi(),
                'per_page' => 5,
                'current_page' => $page
            ]
        ];

        echo view('header_view');
        echo view('sidebar_view');
        echo view('dashboard_view', $data);
        echo view('footer_view');
    }

    public function program()
    {
        // Update total terkumpul untuk semua program
        $programs = $this->programModel->findAll();
        foreach ($programs as $program) {
            $this->donaturModel->updateTotalTerkumpul($program['id_program']);
        }

        // Ambil data terbaru
        $data['programs'] = $this->programModel->getProgram();

        echo view('header_view');
        echo view('sidebar_view');
        echo view('dns_view', $data);
        echo view('footer_view');
    }
    public function tambah_program()
    {
        echo view('header_view');
        echo view('tambah_view');
        echo view('footer_view');
    }

    public function add_program()
    {
        $data = [
            'nama_program' => $this->request->getPost('nama_program'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'target' => $this->request->getPost('target'),
            'terkumpul' => 0, // nilai awal
            'status' => $this->request->getPost('status'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai')
        ];

        $this->programModel->saveProgram($data);

        return redirect()->to(base_url('dashboard/program'))
            ->with('success', 'Program berhasil ditambahkan');
    }

    public function hapus_program($id)
    {
        $program = $this->programModel->find($id);

        if ($program) {
            $this->programModel->hapusProgram($id);
            return redirect()->to(base_url('dashboard/program'))
                ->with('success', 'Program berhasil dihapus');
        }

        return redirect()->to(base_url('dashboard/program'))
            ->with('error', 'Program tidak ditemukan');
    }
    // Tambahkan fungsi-fungsi baru untuk donatur
    public function tambah_donasi()
    {
        echo view('header_view');
        echo view('tambah_donasi_view'); // Buat view baru untuk form donasi
        echo view('footer_view');
    }

    public function laporan()
    {
        $data['programs'] = $this->programModel->getProgramSelesai();

        echo view('header_view');
        echo view('sidebar_view');
        echo view('laporan_view', $data);
        echo view('footer_view');
    }

    public function add_donasi()
    {
        $data = [
            'nm_donatur' => $this->request->getPost('nm_donatur'),
            'tgl_donasi' => $this->request->getPost('tgl_donasi'),
            'id_program' => $this->request->getPost('id_program'),
            'jmlh_nominal' => $this->request->getPost('jmlh_nominal'),
            'status' => 1
        ];

        // Simpan donasi
        $this->donaturModel->insert($data);

        // Update total terkumpul
        $this->donaturModel->updateTotalTerkumpul($data['id_program']);

        return redirect()->to(base_url('dashboard'))
            ->with('success', 'Donasi berhasil ditambahkan');
    }

    public function hapus_donasi($id)
    {
        $donasi = $this->donaturModel->find($id);
        if ($donasi) {
            $id_program = $donasi['id_program'];

            // Hapus donasi
            $this->donaturModel->delete($id);

            // Update total terkumpul
            $this->donaturModel->updateTotalTerkumpul($id_program);

            return redirect()->to(base_url('dashboard'))
                ->with('success', 'Donasi berhasil dihapus');
        }
        return redirect()->to(base_url('dashboard'))
            ->with('error', 'Donasi tidak ditemukan');
    }

    // Fungsi untuk update manual semua total jika diperlukan
    public function update_semua_total()
    {
        $programs = $this->programModel->findAll();
        foreach ($programs as $program) {
            $this->donaturModel->updateTotalTerkumpul($program['id_program']);
        }
        return redirect()->to(base_url('dashboard/program'))
            ->with('success', 'Semua total berhasil diupdate');
    }

    public function view_donasi($id)
    {
        $data['donasi'] = $this->donaturModel->getDonasiDetail($id);

        if (empty($data['donasi'])) {
            return redirect()->to(base_url('dashboard'))
                ->with('error', 'Donasi tidak ditemukan');
        }

        echo view('header_view');
        echo view('donasidetail_view', $data);  // You'll need to create this view
        echo view('footer_view');
    }

    public function update_status_donasi()
    {
        $id = $this->request->getPost('no_donasi');
        $status = $this->request->getPost('status');

        $success = $this->donaturModel->update($id, ['status' => $status]);

        if ($success) {
            // Update total terkumpul after status change
            $donasi = $this->donaturModel->find($id);
            $this->donaturModel->updateTotalTerkumpul($donasi['id_program']);

            return redirect()->to(base_url('dashboard/donasi/view/' . $id))
                ->with('success', 'Status donasi berhasil diupdate');
        }

        return redirect()->to(base_url('dashboard/donasi/view/' . $id))
            ->with('error', 'Gagal mengupdate status donasi');
    }
    public function update_program_status($id)
{
    $program = $this->programModel->find($id);

    if ($program) {
        $this->programModel->updateStatus($id);
        return redirect()->to(base_url('/dashboard/program'))
            ->with('success', 'Program telah diselesaikan pada tanggal ' . date('d/m/Y'));
    }

    return redirect()->to(base_url('/dashboard/program'))
        ->with('error', 'Program tidak ditemukan');
}
}