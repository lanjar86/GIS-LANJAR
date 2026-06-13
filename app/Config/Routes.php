<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('Admin', 'Admin::index');
$routes->get('Admin/Setting', 'Admin::Setting');
$routes->post('Admin/UpdateSetting', 'Admin::UpdateSetting');

// =============================================================
//  SOLUSI TOTAL: DAFTARKAN DUA VERSI (KAPITAL & KECIL) SEKALIGUS
// =============================================================

// Versi Huruf Kapital
$routes->get('Wilayah', 'Wilayah::index');
$routes->get('Wilayah/Input', 'Wilayah::Input');
$routes->post('Wilayah/InsertData', 'Wilayah::InsertData');
$routes->get('Wilayah/Edit/(:any)', 'Wilayah::Edit/$1');
$routes->post('Wilayah/UpdateData/(:num)', 'Wilayah::UpdateData/$1');
$routes->get('Wilayah/Delete/(:num)', 'Wilayah::Delete/$1');

// Versi Huruf Kecil
$routes->get('wilayah', 'Wilayah::index');
$routes->get('wilayah/input', 'Wilayah::Input');
$routes->post('wilayah/insert-data', 'Wilayah::InsertData');
$routes->get('wilayah/edit/(:any)', 'Wilayah::Edit/$1');
$routes->post('wilayah/update-data/(:num)', 'Wilayah::UpdateData/$1');
$routes->get('wilayah/delete/(:num)', 'Wilayah::Delete/$1');