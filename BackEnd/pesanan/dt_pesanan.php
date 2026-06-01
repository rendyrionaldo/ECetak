<?php
include '../Config/koneksi.php';

//ambil data guru
$getorder = mysqli_query($connect, "SELECT * FROM pesanan");
$getpembeli = mysqli_query($connect, "SELECT * FROM users");
$getproduk = mysqli_query($connect, "SELECT * FROM produk");
?>

<div class="content">
    <div class="desc-content">
        <h3>Daftar Pesanan</h3><br>
        <p>Daftar pesanan yang masuk dari pelanggan.</p>
    </div>
    <div class="desc-content2">
        <h3>Tabel Pesanan :</h3><br>

        <table>
            <tr>
                <th>No</th>
                <th>Pembeli</th>
                <th>Produk</th>
                <th>Tema</th>
                <th>Ukuran</th>
                <th>Banyak</th>
                <th>File Contoh</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            //BARIS 2 - MENAMPILKAN ISI DATABASE
            $no = 1;
            while ($data = mysqli_fetch_assoc($getorder)){
            ?>
            <tr>
                <td><?= $no++;?></td>
                <?php
                while ($pembeli = mysqli_fetch_assoc($getpembeli)){
                    if($data['id_users'] == $pembeli['id']){
                ?>
                        <td><?= $pembeli['nama']; ?></td>
                <?php
                    }
                }
                while ($produk = mysqli_fetch_assoc($getproduk)){
                    if($data['id_produk'] == $produk['id']){
                ?>
                        <td><?= $produk['nama']; ?></td>
                <?php
                    }
                }
                ?>
                <td><?= $data['tema']; ?></td>
                <td><?= $data['ukuran']; ?></td>
                <td><?= $data['banyak']; ?></td>
                <td><img src="../gambar/<?= $data['file_pembeli']; ?>"></td>
                <td><?= $data['catatan']; ?></td>
                <td><?= $data['status']; ?></td>
                <td>
                    <a href="?page=editPesanan&id=<?=$data['id'];?>" class="btn edit">Edit</a>
                    <a href="?page=hapusPesanan&id=<?=$data['id'];?>" class="btn hapus">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>