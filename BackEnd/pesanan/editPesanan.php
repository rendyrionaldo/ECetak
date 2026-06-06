<?php
include '../Config/koneksi.php';

$id = $_GET['id'];

$get_data = mysqli_query($connect, "
    SELECT p.*, u.username AS nama_pembeli, pr.nama AS nama_produk
    FROM pesanan p
    JOIN user u ON p.id_user = u.id
    JOIN produk pr ON p.id_produk = pr.id
    WHERE p.id = '$id'
");
$data = mysqli_fetch_assoc($get_data);

if (isset($_POST['update'])) {
    $status     = $_POST['status'];
    $file_admin = $data['file_admin'];

    if (!empty($_FILES['file_admin']['name'])) {
        $folder     = "../gambar/";
        $file_admin = basename($_FILES['file_admin']['name']);

        if (!is_dir($folder)) mkdir($folder, 0777, true);

        if (!empty($data['file_admin']) && file_exists($folder . $data['file_admin'])) {
            unlink($folder . $data['file_admin']);
        }

        move_uploaded_file($_FILES['file_admin']['tmp_name'], $folder . $file_admin);
    }

    $query = mysqli_query($connect, "
        UPDATE pesanan SET
            file_admin = '$file_admin',
            status     = '$status'
        WHERE id = '$id'
    ");

    if ($query) {
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = '?page=pesanan';
              </script>";
    }
}
?>

<div class="backend-content">
    <div class="content">
        <h3>Edit Pesanan</h3>
        <p>Lengkapi formulir ini untuk mengedit pesanan.</p>
    </div>
    <div class="content2">
        <h3>Form Edit Pesanan:</h3><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Produk</label>
                <input type="text" value="<?= $data['nama_produk']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>File Admin Saat Ini</label>
                <?php if (!empty($data['file_admin'])): ?>
                    <a href="../gambar/<?= $data['file_admin']; ?>" target="_blank">
                        Lihat File Lama
                    </a>
                <?php else: ?>
                    <p>Belum ada file</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="file_admin">Upload File Baru (opsional):</label>
                <input type="file" name="file_admin">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" required>
                    <option value="Dikerjakan"    <?= $data['status']=='Dikerjakan'    ? 'selected':'' ?>>Dikerjakan</option>
                    <option value="Desain Selesai"<?= $data['status']=='Desain Selesai'? 'selected':'' ?>>Desain Selesai</option>
                    <option value="Revisi"        <?= $data['status']=='Revisi'        ? 'selected':'' ?>>Revisi</option>
                    <option value="Dicetak"       <?= $data['status']=='Dicetak'       ? 'selected':'' ?>>Dicetak</option>
                    <option value="Selesai"       <?= $data['status']=='Selesai'       ? 'selected':'' ?>>Selesai</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn edit">Update Pesanan</button>
            <a href="?page=pesanan" class="btn hapus">Batal</a>
        </form>
    </div>
</div>