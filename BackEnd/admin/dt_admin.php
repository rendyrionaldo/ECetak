<?php
include '../Config/koneksi.php';

$query = mysqli_query($connect, "SELECT * FROM user WHERE peran='Admin'");
?>

<div class="backend-content">
    <div class="content">
        <h3>Data Admin</h3><br>
        <p>Pada halaman ini menampilkan akun admin</p>
    </div>
    <div class="content2">
        <h3>Tabel Admin :</h3><br>
        <a href="?page=tambahAdmin" class="btn tambah">+ Tambah Admin</a>

        <table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
            <?php
            //BARIS 2 - MENAMPILKAN ISI DATABASE
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $data['username'];?></td>                
                <td>
                    <a href="?page=editAdmin&id=<?=$data['id'];?>" class="btn edit">Edit</a>
                    <a href="?page=hapusAdmin&id=<?=$data['id'];?>" class="btn hapus">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>