<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'admin':
        $file = 'admin/dt_admin.php';
        break;
    case 'produk':
        $file = 'produk/dt_produk.php';
        break;
    case 'tambahProduk':
        $file = 'produk/tambahProduk.php';
        break;
    case 'editProduk':
        $file = 'produk/editProduk.php';
        break;
    case 'hapusProduk':
        $file = 'produk/hapusProduk.php';
        break;
    case 'pesanan':
        $file = 'pesanan/dt_pesanan.php';
        break;
    default:
        $file = 'ad_header.php';
        break;
}

require 'ad_dashboard.php';
require 'ad_sidebar.php';
require $file;
require 'ad_footer.php';
?>