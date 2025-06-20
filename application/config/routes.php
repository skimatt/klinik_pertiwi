<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'auth/login';
// $route['login'] = 'auth/login';
// $route['logout'] = 'auth/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/laporan/cetak_stok_obat'] = 'admin/laporan/cetak_stok_obat';
$route['admin/pengguna/(:any)'] = 'admin/pengguna/$1'; // penting!
$route['admin/pengguna/edit/(:num)'] = 'admin/edit_pengguna/$1';
$route['admin/pengguna/hapus/(:num)'] = 'admin/hapus_pengguna/$1';

// $route['admin/pengguna/tambah'] = 'admin/pengguna/tambah';



// $route['admin/obat'] = 'admin/obat';
// $route['admin/obat/tambah'] = 'admin/tambah';
// $route['admin/obat/edit/(:num)'] = 'admin/edit/$1';
// $route['admin/obat/hapus/(:num)'] = 'admin/hapus/$1';
// $route['admin/obat/simpan'] = 'admin/simpan';
// $route['admin/obat/update/(:num)'] = 'admin/update/$1';
// $route['admin/kategori'] = 'admin/kategori';
// $route['admin/kategori/tambah'] = 'admin/kategori_tambah';
// $route['admin/kategori/edit/(:num)'] = 'admin/kategori_edit/$1';
// $route['admin/kategori/hapus/(:num)'] = 'admin/kategori_hapus/$1';
// $route['admin/jenis'] = 'admin/jenis';
// $route['admin/jenis/tambah'] = 'admin/jenis_tambah';
// $route['admin/jenis/edit/(:num)'] = 'admin/jenis_edit/$1';
// $route['admin/jenis/hapus/(:num)'] = 'admin/jenis_hapus/$1';
// $route['admin/suplier'] = 'admin/suplier';
// $route['admin/suplier/tambah'] = 'admin/suplier_tambah';
// $route['admin/suplier/edit/(:num)'] = 'admin/suplier_edit/$1';
// $route['admin/suplier/hapus/(:num)'] = 'admin/suplier_hapus/$1';
// $route['admin/suplier'] = 'admin/suplier';
// $route['admin/suplier/tambah'] = 'admin/suplier_tambah';
// $route['admin/suplier/edit/(:num)'] = 'admin/suplier_edit/$1';
// $route['admin/suplier/hapus/(:num)'] = 'admin/suplier_hapus/$1';
// $route['admin/suplier/simpan'] = 'admin/simpan';
// $route['admin/suplier/update/(:num)'] = 'admin/update/$1';


// $route['admin/user'] = 'admin/user';
// $route['admin/user/tambah'] = 'admin/user_tambah';
// $route['admin/user/edit/(:num)'] = 'admin/user_edit/$1';
// $route['admin/user/hapus/(:num)'] = 'admin/user_hapus/$1';

// $route['admin/transaksi'] = 'admin/transaksi';
// $route['admin/transaksi/tambah_keranjang'] = 'admin/transaksi_tambah_keranjang';
// $route['admin/transaksi/selesai'] = 'admin/transaksi_selesai';

// $route['admin/penjualan'] = 'admin/penjualan';
// $route['admin/penjualan/detail/(:num)'] = 'admin/penjualan_detail/$1';

// $route['admin/laporan'] = 'admin/laporan';

// $route['admin/obat'] = 'admin/obat';
// $route['admin/obat/tambah'] = 'admin/tambah';
// $route['admin/obat/edit/(:num)'] = 'admin/edit/$1';
// $route['admin/obat/hapus/(:num)'] = 'admin/hapus/$1';


// $route['admin/user'] = 'admin/user';
// $route['admin/user/tambah'] = 'admin/user_tambah';
// $route['admin/user/edit/(:num)'] = 'admin/user_edit/$1';
// $route['admin/user/hapus/(:num)'] = 'admin/user_hapus/$1';

// $route['admin/transaksi'] = 'admin/transaksi';
// $route['admin/transaksi/tambah_keranjang'] = 'admin/transaksi_tambah_keranjang';
// $route['admin/transaksi/selesai'] = 'admin/transaksi_selesai';

// $route['admin/penjualan'] = 'admin/penjualan';
// $route['admin/penjualan/detail/(:num)'] = 'admin/penjualan_detail/$1';

// $route['admin/laporan'] = 'admin/laporan';

// $route['admin/obat'] = 'admin/obat';
// $route['admin/obat/tambah'] = 'admin/tambah';
// $route['admin/obat/edit/(:num)'] = 'admin/edit/$1';
// $route['admin/obat/hapus/(:num)'] = 'admin/hapus/$1';