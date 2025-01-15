<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                <?=lang('Auth.loginTitle')?>
            </h2>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md">
            <?= view('Myth\Auth\Views\_message_block') ?>
            
            <form action="<?= url_to('login') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>
                
                <?php if ($config->validFields === ['email']): ?>
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700">
                            <?=lang('Auth.email')?>
                        </label>
                        <div class="mt-1">
                            <input type="email" name="login" 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php if (session('errors.login')) : ?>border-red-500<?php endif ?>"
                                placeholder="<?=lang('Auth.email')?>">
                            <div class="text-red-500 text-xs mt-1">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700">
                            <?=lang('Auth.emailOrUsername')?>
                        </label>
                        <div class="mt-1">
                            <input type="text" name="login" 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php if (session('errors.login')) : ?>border-red-500<?php endif ?>"
                                placeholder="<?=lang('Auth.emailOrUsername')?>">
                            <div class="text-red-500 text-xs mt-1">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <?=lang('Auth.password')?>
                    </label>
                    <div class="mt-1">
                        <input type="password" name="password" 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php if (session('errors.password')) : ?>border-red-500<?php endif ?>"
                            placeholder="<?=lang('Auth.password')?>">
                        <div class="text-red-500 text-xs mt-1">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                </div>

                <?php if ($config->allowRemembering): ?>
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" 
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <label class="ml-2 block text-sm text-gray-900">
                            <?=lang('Auth.rememberMe')?>
                        </label>
                    </div>
                <?php endif; ?>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <?=lang('Auth.loginAction')?>
                    </button>
                </div>
            </form>

            <?php if ($config->allowRegistration || $config->activeResetter): ?>
                <div class="mt-6 space-y-4 text-center">
                    <?php if ($config->allowRegistration) : ?>
                        <p class="text-sm">
                            <a href="<?= url_to('register') ?>" class="font-medium text-blue-600 hover:text-blue-500">
                                <?=lang('Auth.needAnAccount')?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <?php if ($config->activeResetter): ?>
                        <p class="text-sm">
                            <a href="<?= url_to('forgot') ?>" class="font-medium text-blue-600 hover:text-blue-500">
                                <?=lang('Auth.forgotYourPassword')?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>