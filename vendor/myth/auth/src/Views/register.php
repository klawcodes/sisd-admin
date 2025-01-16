<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Register - DonasiKita
            </h2>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md">
            <?= view('Myth\Auth\Views\_message_block') ?>
            
            <form action="<?= url_to('register') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        <?=lang('Auth.email')?>
                    </label>
                    <div class="mt-1">
                        <input type="email" name="email" 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php if (session('errors.email')) : ?>border-red-500<?php endif ?>"
                            placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                        <div class="text-red-500 text-xs mt-1">
                            <?= session('errors.email') ?>
                        </div>
                        <small class="text-gray-500 text-xs"><?=lang('Auth.weNeverShare')?></small>
                    </div>
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        <?=lang('Auth.username')?>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="username" 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php if (session('errors.username')) : ?>border-red-500<?php endif ?>"
                            placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                        <div class="text-red-500 text-xs mt-1">
                            <?= session('errors.username') ?>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <?=lang('Auth.password')?>
                    </label>
                    <div class="mt-1">
                        <input type="password" name="password" 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php if (session('errors.password')) : ?>border-red-500<?php endif ?>"
                            placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                        <div class="text-red-500 text-xs mt-1">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="pass_confirm" class="block text-sm font-medium text-gray-700">
                        <?=lang('Auth.repeatPassword')?>
                    </label>
                    <div class="mt-1">
                        <input type="password" name="pass_confirm" 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php if (session('errors.pass_confirm')) : ?>border-red-500<?php endif ?>"
                            placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                        <div class="text-red-500 text-xs mt-1">
                            <?= session('errors.pass_confirm') ?>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <?=lang('Auth.register')?>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    <?=lang('Auth.alreadyRegistered')?> 
                    <a href="<?= url_to('login') ?>" class="font-medium text-blue-600 hover:text-blue-500">
                        <?=lang('Auth.signIn')?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>