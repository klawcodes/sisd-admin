<div class="container mx-auto p-6">
    <!-- Judul Laporan -->
    <h2 class="text-3xl font-bold mb-6">Laporan Donasi</h2>
    <!-- Tabel Laporan Donasi -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Program ID</th>
                    <th class="px-4 py-2 text-left">Nama Program</th>
                    <th class="px-4 py-2 text-left">Deskripsi</th>
                    <th class="px-4 py-2 text-left">Jumlah Nominal</th>
                    <th class="px-4 py-2 text-left">Tanggal Mulai</th>
                    <th class="px-4 py-2 text-left">Tanggal Selesai</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($programs as $program): ?>
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2"><?= $program['id_program'] ?></td>
                    <td class="px-4 py-2"><?= $program['nama_program'] ?></td>
                    <td class="px-4 py-2"><?= $program['deskripsi'] ?></td>
                    <td class="px-4 py-2">Rp <?= number_format($program['terkumpul'], 0, ',', '.') ?></td>
                    <td class="px-4 py-2"><?= $program['tgl_mulai'] ?></td>
                    <td class="px-4 py-2"><?= $program['tgl_selesai'] ?></td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                            Selesai
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <button onclick="hapusProgram(<?= $program['id_program'] ?>)" 
                                class="p-2 text-red-500 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($programs)): ?>
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">Tidak ada program yang selesai</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function hapusProgram(id) {
    if (confirm('Apakah Anda yakin ingin menghapus program ini?')) {
        window.location.href = '<?= base_url('dashboard/hapus-program/') ?>' + id;
    }
}
</script>