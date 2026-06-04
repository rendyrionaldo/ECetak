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
    case 'tambahPesanan':
        $file = 'pesanan/tambahPesanan.php';
        break;
    case 'editPesanan':
        $file = 'pesanan/editPesanan.php';
        break;
    case 'hapusPesanan':
        $file = 'pesanan/hapusPesanan.php';
        break;
    case 'admin':
        $file = 'admin/dt_admin.php';
        break;
    case 'editAdmin':
        $file = 'admin/editAdmin.php';
        break;
    case 'tambahAdmin':
        $file = 'admin/tambahAdmin.php';
        break;
    case 'hapusAdmin':
        $file = 'admin/hapusAdmin.php';
        break;
    default:
        $file = 'ad_dashboard.php';
        break;
}

require 'ad_header.php';
require 'ad_sidebar.php';
require $file;
require 'ad_footer.php';
?>