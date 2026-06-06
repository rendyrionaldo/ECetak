<?php
include '../Config/koneksi.php';

$query = mysqli_query($connect, "SELECT * FROM produk");
?>

<div class="backend-content">
    <div class="content">
        <h3>Manajemen Produk</h3><br>
        <p>Lakukan manajemen produk di sini. Admin dapat melakukan penambahan, pengeditan, dan penghapusan produk.</p>
    </div>
    <div class="content2">
        <h3>Tabel Produk :</h3><br>
        <a href="?page=tambahProduk" class="btn tambah">+ Tambah Produk</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['deskripsi']; ?></td>
                <td><?= $data['harga'];?></td>
                <td><a href="../gambar/<?= $data['gambar']; ?>" target="_blank">Lihat File</a></td>
                <td>
                    <a href="?page=editProduk&id=<?=$data['id'];?>" class="btn edit">Edit</a>
                    <a href="?page=hapusProduk&id=<?=$data['id'];?>" class="btn hapus">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>