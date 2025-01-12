<!-- app/Views/admin/dashboard.php -->
<div class="flex min-h-screen bg-gray-100">
    <!-- Main Content - Adjusted margin for mobile -->
    <div class="lg:ml-64 w-full p-4 lg:p-8 transition-all duration-300">
        <div class="container mx-auto">
            <!-- Welcome Message -->
            <div class="bg-white rounded-lg shadow p-4 lg:p-6 mb-6">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">Selamat datang di DonasiKita</h1>
            </div>

            <!-- Dashboard Cards - Responsive grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                <!-- Total Donasi Card -->
                <div class="bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <i class="fas fa-money-bill text-white text-xl lg:text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-600 text-sm">Total Donasi</h2>
                            <p class="text-lg lg:text-2xl font-semibold text-gray-800">Rp 5.000.000</p>
                        </div>
                    </div>
                </div>

                <!-- Total Donatur Card -->
                <div class="bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-500 bg-opacity-75">
                            <i class="fas fa-users text-white text-xl lg:text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-600 text-sm">Total Donatur</h2>
                            <p class="text-lg lg:text-2xl font-semibold text-gray-800">150</p>
                        </div>
                    </div>
                </div>

                <!-- Program Aktif Card -->
                <div class="bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-500 bg-opacity-75">
                            <i class="fas fa-chart-line text-white text-xl lg:text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-600 text-sm">Program Aktif</h2>
                            <p class="text-lg lg:text-2xl font-semibold text-gray-800">12</p>
                        </div>
                    </div>
                </div>

                <!-- Penyaluran Card -->
                <div class="bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-500 bg-opacity-75">
                            <i class="fas fa-hand-holding-heart text-white text-xl lg:text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-600 text-sm">Total Penyaluran</h2>
                            <p class="text-lg lg:text-2xl font-semibold text-gray-800">Rp 3.500.000</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Donations Table -->
            <div class="bg-white rounded-lg shadow mt-6">
                <div class="p-4 border-b border-gray-200">
                    <h2 class="text-lg lg:text-xl font-semibold text-gray-800">Donasi Terbaru</h2>
                </div>
                <div class="p-4 overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">Nama Donatur</th>
                <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">Program</th>
                <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($donasi_terbaru as $donasi): ?>
            <tr>
                <td class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                    <?= date('d M Y', strtotime($donasi['tgl_donasi'])) ?>
                </td>
                <td class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                    <?= esc($donasi['nm_donatur']) ?>
                </td>
                <td class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                    <?= esc($donasi['nama_program']) ?>
                </td>
                <td class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                    Rp <?= number_format($donasi['jmlh_nominal'], 0, ',', '.') ?>
                </td>
                <td class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm">
                    <?php if($donasi['status'] == 1): ?>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Berhasil
                        </span>
                    <?php else: ?>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Gagal
                        </span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</div>