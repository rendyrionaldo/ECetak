<?php
include 'Config/koneksi.php';

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    echo "
    <script>
        alert('Silakan login terlebih dahulu untuk mengakses halaman pesanan!');
        window.location.href='?page=login';
    </script>
    ";
    exit;
}
$getorder = mysqli_query($connect,"
    SELECT
        p.*,
        pr.nama AS nama_produk
    FROM pesanan p
    JOIN produk pr ON p.id_produk = pr.id
    WHERE id_user='$user_id' ORDER BY p.id DESC
");
if(!$getorder){
    die(mysqli_error($connect));
}
?>

<div class="user-content">
    <div class="container-card">
        <h3>Pesanan Saya</h3>
        <p>Daftar pesanan yang telah Anda buat. Klik "Lihat Detail" untuk melihat informasi lengkap tentang pesanan Anda.</p>
        <div class="pesanan-tabel">
            <table>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Ukuran</th>
                <th>Banyak</th>
                <th>File Contoh</th>
                <th>File Akhir</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            //BARIS 2 - MENAMPILKAN ISI DATABASE
            $no = 1;
            while($data = mysqli_fetch_assoc($getorder)){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_produk']; ?></td>
                <td><?= $data['ukuran']; ?></td>
                <td><?= $data['banyak']; ?></td>
                <td>
                    <a href="gambar/<?= $data['file_pembeli']; ?>" target="_blank">Lihat File</a>
                </td>
                <td>
                    <?php 
                        if(!empty($data['file_admin'])){
                            echo '<a href="gambar/' . $data['file_admin'] . '" target="_blank">Lihat File</a>';
                        } else {
                            echo 'Belum ada file akhir';
                        }
                    ?>
                </td>
                <td><?= $data['catatan']; ?></td>
                <td><?= $data['status']; ?></td>
                <td>
                    <a href="?page=editPesanan&id=<?= $data['id']; ?>" class="btn edit">Edit Pesanan</a>
                    <a href="?page=batalPesanan&id=<?= $data['id']; ?>" class="btn batal">Batalkan pesanan</a>
                </td>
            </tr>
            <?php }?>
        </table>
        </div>
    </div>
</div>