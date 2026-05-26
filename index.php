<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'tentang':
        $file = 'FrontEnd/us_tentang.php';
        break;
    case 'produk':
        $file = 'FrontEnd/us_produk.php';
        break;
    case 'kontak':
        $file = 'FrontEnd/us_kontak.php';
        break;
    case 'daftar':
        $file = 'FrontEnd/us_daftar.php';
        break;
    default:
        $file = 'FrontEnd/index.php';
        break;
}

require 'FrontEnd/frontHeader.php';
require 'FrontEnd/frontNavbar.php';
require $file;
require 'FrontEnd/frontFooter.php';
?>