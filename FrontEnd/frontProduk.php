<?php
include 'Config/koneksi.php';

$query = mysqli_query($connect, "SELECT * FROM produk");
?>

<div class="user-content">
    <div class="container-card">
        <h3>Katalog Produk</h3>
        <p>Temukan berbagai produk yang sesuai dengan kebutuhan anda. Mulai dari kebutuhan kantor, acara, pribadi, dll.</p>
        <p>Temukan spanduk, name tag, banner, mug, nota, dan lainnya lalu pesan secara online dan tinggal ambil di toko kami tanpa repot!</p>
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
                    <a href="?page=buatPesanan&id=<?= $produk['id']; ?>">Pesan</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>