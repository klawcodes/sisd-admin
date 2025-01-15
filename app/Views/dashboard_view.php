<!-- app/Views/admin/dashboard.php -->
<div class="flex min-h-screen bg-gray-100">
    <!-- Main Content - Adjusted margin for mobile -->
    <div class="w-full p-4 lg:p-8 transition-all duration-300">
        <div class="container mx-auto">
            <!-- Welcome Message -->
            <div class="bg-white rounded-lg shadow p-4 lg:p-6 mb-6 flex justify-between items-center">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">Selamat datang di DonasiKita</h1>
                <?php if (logged_in()) : ?>
                <a href="/logout" class="px-2 inline-flex leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Logout</a>
                <?php else : ?>
                <a href="/login" class="px-2 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">Login</a>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                <!-- Total Donasi Card -->
                <div class="bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <i class="fas fa-money-bill text-white text-xl lg:text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-600 text-sm">Total Terkumpul</h2>
                            <p class="text-lg lg:text-2xl font-semibold text-gray-800">
                                Rp <?= number_format($total_donasi, 0, ',', '.') ?>
                            </p>
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
                            <p class="text-lg lg:text-2xl font-semibold text-gray-800">
                                <?= number_format($total_donatur, 0, ',', '.') ?>
                            </p>
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
                                <p class="text-lg lg:text-2xl font-semibold text-gray-800">
                                    <?= number_format($total_program, 0, ',', '.') ?>
                                </p>
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
                                <p class="text-lg lg:text-2xl font-semibold text-gray-800">
                                    Rp <?= number_format($total_penyaluran, 0, ',', '.') ?>
                                </p>
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
                                <th
                                    class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th
                                    class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Donatur</th>
                                <th
                                    class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Program</th>
                                <th
                                    class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah</th>
                                <th
                                    class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs lg:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($donasi_terbaru as $donasi): ?>
                                <tr>
                                    <td
                                        class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                                        <?= date('d M Y', strtotime($donasi['tgl_donasi'])) ?>
                                    </td>
                                    <td
                                        class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                                        <?= esc($donasi['nm_donatur']) ?>
                                    </td>
                                    <td
                                        class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                                        <?= esc($donasi['nama_program']) ?>
                                    </td>
                                    <td
                                        class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm text-gray-900">
                                        Rp <?= number_format($donasi['jmlh_nominal'], 0, ',', '.') ?>
                                    </td>
                                    <td class="px-3 py-2 lg:px-4 lg:py-3 whitespace-nowrap text-xs lg:text-sm">
                                        <div class="flex items-center gap-2">
                                            <?php if ($donasi['status'] == 1): ?>
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Approve
                                                </span>
                                            <?php else: ?>
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Not Approve
                                                </span>
                                            <?php endif; ?>
                                            <a href="<?= base_url('dashboard/donasi/view/' . $donasi['no_donasi']) ?>"
                                                class="px-2 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                                                View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-200">
        <?php
        $total_pages = ceil($pager['total_records'] / $pager['per_page']);
        $current_page = $pager['current_page'];
        ?>
        
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing <?= (($current_page - 1) * 5) + 1 ?> to 
                <?= min($current_page * 5, $pager['total_records']) ?> of 
                <?= $pager['total_records'] ?> entries
            </div>
            
            <div class="flex space-x-1">
                <?php if ($current_page > 1): ?>
                    <a href="<?= base_url('dashboard?page=' . ($current_page - 1)) ?>"
                       class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                        Previous
                    </a>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="<?= base_url('dashboard?page=' . $i) ?>"
                       class="px-3 py-1 text-sm <?= $i == $current_page ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' ?> rounded-md">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
                
                <?php if ($current_page < $total_pages): ?>
                    <a href="<?= base_url('dashboard?page=' . ($current_page + 1)) ?>"
                       class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                        Next
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>