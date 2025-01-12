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

<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Detail Donasi</h2>
    
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-gray-600">Nama Donatur</p>
            <p class="font-semibold"><?= esc($donasi['nm_donatur']) ?></p>
        </div>
        <div>
            <p class="text-gray-600">Tanggal Donasi</p>
            <p class="font-semibold"><?= date('d M Y', strtotime($donasi['tgl_donasi'])) ?></p>
        </div>
        <div>
            <p class="text-gray-600">Program</p>
            <p class="font-semibold"><?= esc($donasi['nama_program']) ?></p>
        </div>
        <div>
            <p class="text-gray-600">Jumlah Nominal</p>
            <p class="font-semibold">Rp <?= number_format($donasi['jmlh_nominal'], 0, ',', '.') ?></p>
        </div>
    </div>

    <form action="<?= base_url('dashboard/update-status-donasi') ?>" method="POST" class="mt-6">
        <?= csrf_field() ?>
        <input type="hidden" name="no_donasi" value="<?= $donasi['no_donasi'] ?>">
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Status Donasi
            </label>
            <select name="status" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="0" <?= $donasi['status'] == 0 ? 'selected' : '' ?>>Not Approve</option>
                <option value="1" <?= $donasi['status'] == 1 ? 'selected' : '' ?>>Approve</option>
            </select>
        </div>

        <div class="flex justify-end gap-4">
            <a href="<?= base_url('dashboard') ?>" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                Kembali
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                Update Status
            </button>
        </div>
    </form>
</div>