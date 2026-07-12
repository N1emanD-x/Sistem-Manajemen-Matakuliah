<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
/*
 * ROUTING MATAKULIAH
 * Mendefinisikan URL yang bisa diakses
 * dan method controller yang dipanggil
 */

/* READ — Tampil semua data */
$routes->get('/matakuliah', 'MataKuliah::index');

/* CREATE — Tampil form tambah */
$routes->get('/matakuliah/tambah', 'MataKuliah::create');

/* STORE — Proses simpan data baru */
$routes->post('/matakuliah/simpan', 'MataKuliah::store');

/* EDIT — Tampil form edit berdasarkan ID */
$routes->get('/matakuliah/edit/(:num)', 'MataKuliah::edit/$1');

/* UPDATE — Proses update data berdasarkan ID */
$routes->post('/matakuliah/update/(:num)', 'MataKuliah::update/$1');

/* DELETE — Hapus data berdasarkan ID */
$routes->get('/matakuliah/delete/(:num)', 'MataKuliah::delete/$1');