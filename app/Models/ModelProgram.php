<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelProgram extends Model
{
    protected $table = 'tb_program';
    protected $primaryKey = 'id_program';
    protected $allowedFields = ['nama_program', 'deskripsi', 'target', 'terkumpul', 'status', 'tgl_mulai', 'tgl_selesai'];

    // Method yang sudah ada
    public function getProgram()
    {
        return $this->findAll();
    }

    public function saveProgram($data)
    {
        return $this->save($data);
    }

    public function hapusProgram($id)
    {
        return $this->delete($id);
    }

    // Method baru untuk menghitung total program aktif
    public function getTotalProgramAktif()
    {
        return $this->where('status', 1)
            ->countAllResults();
    }

    public function getProgramSelesai()
    {
        return $this->where('status', 0)->findAll();
    }

    // Method baru untuk menghitung total target penyaluran
    public function getTotalPenyaluran()
    {
        return $this->selectSum('target', 'total')
            ->get()
            ->getRow()
            ->total ?? 0;
    }
    public function updateStatus($id)
{
    return $this->update($id, [
        'status' => 0,
        'tgl_selesai' => date('Y-m-d') // Menambahkan tanggal selesai saat ini
    ]);
}
    
}