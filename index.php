<?php
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
        $file = 'FrontEnd/frontDaftar.php';
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