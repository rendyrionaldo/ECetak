<?php
include '../Config/koneksi.php';

$getorder = mysqli_query($connect,"
    SELECT
        p.*,
        u.username AS nama_pembeli,
        pr.nama AS nama_produk
    FROM pesanan p
    JOIN user u ON p.id_user = u.id
    JOIN produk pr ON p.id_produk = pr.id
");
if(!$getorder){
    die(mysqli_error($connect));
}
?>

<div class="backend-content">
    <div class="content">
        <h3>Daftar Pesanan</h3><br>
        <p>Daftar pesanan yang masuk dari pelanggan.</p>
    </div>
    <div class="content2">
        <h3>Tabel Pesanan :</h3><br>
        <table>
            <tr>
                <th>No</th>
                <th>Pembeli</th>
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
                <td><?= $data['nama_pembeli']; ?></td>
                <td><?= $data['nama_produk']; ?></td>
                <td><?= $data['ukuran']; ?></td>
                <td><?= $data['banyak']; ?></td>
                <td>
                    <a href="../gambar/<?= $data['file_pembeli']; ?>" target="_blank">Lihat File</a>
                </td>
                <td>
                    <?php 
                        if(!empty($data['file_admin'])){
                            echo '<a href="../gambar/' . $data['file_admin'] . '" target="_blank">Lihat File</a>';
                        } else {
                            echo 'Belum ada file akhir';
                        }
                    ?>
                </td>
                <td><?= $data['catatan']; ?></td>
                <td><?= $data['status']; ?></td>
                <td>
                    <a href="?page=editPesanan&id=<?= $data['id']; ?>" class="btn edit">Edit</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>