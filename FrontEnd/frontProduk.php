<?php
include 'Config/koneksi.php';

//ambil data guru
$query = mysqli_query($connect, "SELECT * FROM produk");

$search = trim($_GET['input-cari'] ?? '');

// Hitung total data untuk pagination
if ($search) {
    $countStmt = $connect->prepare("
        SELECT COUNT(*) FROM produk 
        WHERE nama LIKE :search
    ");
    $countStmt->execute([':search' => "%$search%"]);
} else {
    $countStmt = $connect->prepare("SELECT COUNT(*) FROM produk");
    $countStmt->execute();
}
?>

<div class="user-content">
    <div class="container-card">
        <h3>Katalog Produk</h3>
        <p>Temukan berbagai produk yang sesuai dengan kebutuhan anda. Mulai dari kebutuhan kantor, acara, pribadi, dll.</p>
        <p>Temukan spanduk, name tag, banner, mug, nota, dan lainnya lalu pesan secara online dan tinggal ambil di toko kami tanpa repot!</p>
        <div class="search-bar">
            <input type="text" class="input-cari" placeholder="🔍 Cari produk...">
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
                    <a href="?page=buatPesanan&id=<?= $produk['id']; ?>">Pesan</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>