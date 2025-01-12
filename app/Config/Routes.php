<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function() {
    return redirect()->to(base_url('dashboard'));
});
$routes->get('/login', 'Login::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/program', 'Dashboard::program');
$routes->get('/dashboard/tambah-program', 'Dashboard::tambah_program');
$routes->post('/dashboard/program/add', 'Dashboard::add_program');
$routes->get('/dashboard/hapus-program/(:num)', 'Dashboard::hapus_program/$1');
$routes->get('/dashboard/update-status/(:num)', 'Dashboard::update_status/$1');
$routes->get('dashboard/donasi/view/(:num)', 'Dashboard::view_donasi/$1');
$routes->post('dashboard/update-status-donasi', 'Dashboard::update_status_donasi');
