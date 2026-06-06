<?php
include '../Config/koneksi.php';


$queryProduk = mysqli_query($connect, "SELECT COUNT(*) AS total FROM produk");
$totalProduk = mysqli_fetch_assoc($queryProduk)['total'];

$queryUser = mysqli_query($connect, "SELECT COUNT(*) AS total FROM user");
$totalUser = mysqli_fetch_assoc($queryUser)['total'];

$queryPesanan = mysqli_query($connect, "SELECT COUNT(*) AS total FROM pesanan");
$totalPesanan = mysqli_fetch_assoc($queryPesanan)['total'];

?>

<div class="backend-content">
    <div class="content">
        <h3>Dashboard - Admin</h3>
        <p>Rangkuman hasil pengelolaan produk dan pesanan yang ada</p>
    </div>

    <div class="content2">
        <h2>Jumlah Produk dan Pesanan</h2><br>
        <div class="bag-total">
            <div class="sub-bag-total">
                <p class="des-bagian">Total Produk:</p>
                <p class="jmlh-bagian"><?= $totalProduk ?></p>
            </div>
            <div class="sub-bag-total">
                <p class="des-bagian">Total Pesanan:</p>
                <p class="jmlh-bagian"><?= $totalPesanan ?></p>
            </div>
            <div class="sub-bag-total">
                <p class="des-bagian">Total User:</p>
                <p class="jmlh-bagian"><?= $totalUser ?></p>
            </div>
        </div>
    </div>
</div>