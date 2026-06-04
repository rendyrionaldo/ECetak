<?php
include 'Config/koneksi.php';

//ambil data guru
$query = mysqli_query($connect, "SELECT * FROM produk");
?>

<div class="user-content">
    <div class="container-card">
        <h3>Katalog Produk</h3>
        <p>Temukan berbagai produk yang sesuai dengan kebutuhan anda.</p>
        <div class="search-bar">
            <input type="text" class="input-cari" placeholder="🔍 Cari produk..." id="search-input">
            <button class="btn-cari">Cari</button>
        </div>
    </div>
    <div class="produk-container">
    <?php while($produk = mysqli_fetch_assoc($query)) : ?>
        <div class="produk-card">
            <img src="gambar/<?= $produk['gambar']; ?>">
            <div class="produk-info">
                <h3><?=  $produk['nama']; ?></h3>
                <p><?= $produk['deskripsi']; ?></p>
                <div class="produk-belah">
                    <p>Rp <?= number_format($produk['harga']); ?></p>
                    <a href="buatPesanan.php?id=<?= $produk['id']; ?>">Pesan</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>