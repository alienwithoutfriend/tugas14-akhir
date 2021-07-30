<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Home
$route['default_controller'] = 'Home/ToLogin';
$route['login'] = 'Home/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Admin
$route['admin-dashboard'] = 'Admin/Dashboard';
$route['kelola-barang'] = 'Admin/ToDataBarang';
$route['kelola-kategori'] = 'Admin/ToKategori';
$route['kelola-gudang'] = 'Admin/ToGudang';
$route['barang-masuk'] = 'Admin/ToBarangMasuk';
$route['kelola-permintaan'] = 'Admin/ToBarangKeluar';
$route['kelola-opname'] = 'Admin/ToOpname';