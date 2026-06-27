<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// --- TAMBAHKAN BARIS INI UNTUK MENANGKAP REDIRECT DARI CONTROLLER ---
$routes->get('home', 'Home::index');
$routes->get('public/home', 'Home::index');
$routes->get('public/home/CekLogin', 'Home::CekLogin');
$routes->post('public/home/CekLogin', 'Home::CekLogin');
// -------------------------------------------------------------------

$routes->get('Admin', 'Admin::index');
$routes->get('Admin/Setting', 'Admin::Setting');
// ... sisa kode routes kamu ke bawah tetap sama

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

$routes->get('Kategori', 'Kategori::index');
$routes->get('kategori', 'Kategori::index');

$routes->get('Minimarket', 'Minimarket::index');
$routes->get('minimarket', 'Minimarket::index');

$routes->get('User', 'User::index');
$routes->get('user', 'User::index');

// Versi CamelCase / Huruf Besar di Awal (Sesuai nama Controller)
$routes->post('Kategori/updateMarker/(:num)', 'Kategori::updateMarker/$1');

// Versi Huruf Kecil Semua (Sering digunakan di URL browser)
$routes->post('kategori/updatemarker/(:num)', 'Kategori::updateMarker/$1');
$routes->post('kategori/updateMarker/(:num)', 'Kategori::updateMarker/$1');

$routes->post('Minimarket/InsertData', 'Minimarket::InsertData');
$routes->post('minimarket/InsertData', 'Minimarket::InsertData');

$routes->get('Minimarket/Delete/(:num)', 'Minimarket::Delete/$1');
$routes->get('minimarket/Delete/(:num)', 'Minimarket::Delete/$1');

// Tambahkan ini di Routes.php jika belum ada, untuk jaga-jaga penulisan URL
$routes->get('Admin', 'Admin::index');
$routes->get('admin', 'Admin::index');