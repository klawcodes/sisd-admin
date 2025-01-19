<?php


namespace Myth\Auth\Config;
namespace app\Controllers;

use CodeIgniter\Router\RouteCollection;
use Myth\Auth\Config\Auth as AuthConfig;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(AuthConfig::class);
    $reservedRoutes = $config->reservedRoutes;

    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');


    // Registration
   // $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    //$routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');
});
$routes->get('/', function() {
   return redirect()->to(base_url('dashboard'));
});
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'login']);
$routes->get('/dashboard/program', 'Dashboard::program');
$routes->get('/dashboard/tambah-program', 'Dashboard::tambah_program');
$routes->post('/dashboard/program/add', 'Dashboard::add_program');
$routes->get('/dashboard/hapus-program/(:num)', 'Dashboard::hapus_program/$1');
$routes->get('/dashboard/update-status/(:num)', 'Dashboard::update_status/$1');
$routes->get('dashboard/donasi/view/(:num)', 'Dashboard::view_donasi/$1');
$routes->post('dashboard/update-status-donasi', 'Dashboard::update_status_donasi');
$routes->post('dashboard/donasi/hapus/(:num)', 'Dashboard::hapus_donasi/$1');
$routes->get('/dashboard/update-program-status/(:num)', 'Dashboard::update_program_status/$1');

$routes->get('/dashboard/laporan', 'Dashboard::laporan');

