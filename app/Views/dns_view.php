<!-- app/Views/admin/donasi.php -->
<div class="p-4 lg:p-6">
    <div class="mb-6">
        <div class="bg-white rounded-lg shadow p-4 lg:p-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="mb-4 lg:mb-0">
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">Program Donasi & Sumbangan</h1>
                    <p class="text-gray-600 mt-2">Kelola program donasi dan sumbangan yang sedang berjalan</p>
                </div>
                <button
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    <a href="<?= base_url('dashboard/tambah-program') ?>"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Program
                    </a>
                </button>
            </div>
        </div>
    </div>

    <!-- Program Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($programs as $program): ?>
            <?php
            // Hitung persentase
            $percentage = ($program['terkumpul'] / $program['target']) * 100;
            $percentage = min(100, $percentage);

            // Tentukan warna progress bar
            $progressColor = 'bg-blue-500';
            if ($percentage >= 100) {
                $progressColor = 'bg-green-500';
            } elseif ($percentage >= 75) {
                $progressColor = 'bg-blue-500';
            } elseif ($percentage >= 50) {
                $progressColor = 'bg-yellow-500';
            } else {
                $progressColor = 'bg-orange-500';
            }
            ?>
            <div class="bg-white rounded-lg shadow">
                <div class="p-4">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-lg font-semibold text-gray-800">Program ID: <?= $program['id_program'] ?></h3>
                        <button onclick="hapusProgram(<?= $program['id_program'] ?>)"
                            class="p-2 text-red-500 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-2"><?= esc($program['nama_program']) ?></h4>
                    <p class="text-gray-600 text-sm mb-3"><?= esc($program['deskripsi']) ?></p>

                    <!-- Progress Section -->
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm text-gray-500">Progress</span>
                            <span class="text-sm font-semibold text-gray-700"><?= number_format($percentage, 1) ?>%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="<?= $progressColor ?> h-2.5 rounded-full transition-all duration-500"
                                style="width: <?= $percentage ?>%">
                            </div>
                        </div>
                    </div>

                    <!-- Hapus foreach kedua dan gunakan langsung variabel $program -->
                    <div class="flex flex-col space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Target:</span>
                            <span class="font-semibold text-gray-800">Rp
                                <?= number_format($program['target'], 0, ',', '.') ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Terkumpul:</span>
                            <span class="font-semibold text-gray-800">Rp
                                <?= number_format($program['terkumpul'], 0, ',', '.') ?></span>
                        </div>
                        <div class="flex place-content-between">
                            <?php if ($program['status'] == 1): ?>
                                <a href="<?= base_url('dashboard/update-program-status/' . $program['id_program']) ?>"
                                    class="px-3 py-1 bg-blue-900 text-blue-50 text-sm rounded-full hover:bg-blue-200 hover:no-underline hover:text-blue-900 cursor-pointer">
                                    Selesaikan
                                </a>
                            <?php endif; ?>
                            <span
                                class="px-3 py-1 <?= $program['status'] ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' ?> text-sm rounded-full">
                                <?= $program['status'] ? 'Aktif' : 'Selesai' ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php endforeach; ?>
        
    </div>
</div>

<script>
    function hapusProgram(id) {
        if (confirm('Apakah Anda yakin ingin menghapus program ini?')) {
            window.location.href = '<?= base_url('dashboard/hapus-program/') ?>/' + id;
        }
    }
</script>