<?php
include '../../Config/koneksi.php';

//ambil data guru
$query = mysqli_query($connect, "SELECT * FROM produk");
?>

<div class="content">
    <div class="desc-content">
        <h3>Manajemen Produk</h3><br>
        <p>Lakukan manajemen produk di sini. Admin dapat melakukan penambahan, pengeditan, dan penghapusan produk.</p>
    </div>
    <div class="desc-content2">
        <h3>Tabel Produk :</h3><br>
        <a href="?page=tambahProduk" class="btn tambah">+ Tambah Produk</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php
            //BARIS 2 - MENAMPILKAN ISI DATABASE
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['deskripsi']; ?></td>
                <td><?= $data['harga'];?></td>
                <td>
                    <a href="?page=editProduk&id=<?=$data['id'];?>" class="btn edit">Edit</a>
                    <a href="?page=hapusProduk&id=<?=$data['id'];?>" class="btn hapus">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>