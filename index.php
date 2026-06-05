<?php
session_start();
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'tentang':
        $file = 'FrontEnd/frontTentang.php';
        break;
    case 'produk':
        $file = 'FrontEnd/frontProduk.php';
        break;
    case 'login':
        $file = 'login.php';
        break;
    case 'daftar':
        $file = 'daftarUser.php';
        break;
    case 'buatPesanan':
        $file = 'BackEnd/pesanan/buatPesanan.php';
        break;
    case 'pesanan':
        $file = 'FrontEnd/frontPesanan.php';
        break;
    case 'editPesanan':
        $file = 'BackEnd/pesanan/ubahPesanan.php';
        break;
    case 'batalPesanan':
        $file = 'BackEnd/pesanan/batalPesanan.php';
        break;
    default:
        $file = 'FrontEnd/frontHome.php';
        break;
}

require 'FrontEnd/frontHeader.php';
require 'FrontEnd/frontNavbar.php';
require $file;
require 'FrontEnd/frontFooter.php';
?>