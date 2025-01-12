<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/program', 'Dashboard::program');
$routes->get('/dashboard/tambah-program', 'Dashboard::tambah_program');
$routes->post('/dashboard/program/add', 'Dashboard::add_program');
$routes->get('/dashboard/hapus-program/(:num)', 'Dashboard::hapus_program/$1');
