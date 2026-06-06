<?php
include 'Config/koneksi.php';

$id = $_GET['id'];

$get_data = mysqli_query($connect, "
    SELECT
        p.*,
        u.username AS nama_pembeli,
        pr.nama AS nama_produk
    FROM pesanan p
    JOIN user u ON p.id_user = u.id
    JOIN produk pr ON p.id_produk = pr.id
    WHERE p.id = '$id'
");
$data = mysqli_fetch_assoc($get_data);

if (isset($_POST['update'])) {
    $banyak  = $_POST['banyak'];
    $status  = $_POST['status'];
    $catatan = $_POST['catatan'];

    $query = mysqli_query($connect, "UPDATE pesanan SET 
                                    banyak='$banyak',
                                    catatan='$catatan',
                                    status='$status'
                                    WHERE id='$id'");
    if ($query) {
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = '?page=pesanan';
              </script>";
    }
}
?>

<div class="pesanan-content">
    <div class="pesanan-card">
        <h1>Edit Pesanan</h1>
        <form method="POST" enctype="multipart/form-data" class="pesanan-form">

            <label>Produk</label>
            <input type="text" value="<?= $data['nama_produk']; ?>" readonly>

            <label>Pembeli</label>
            <input type="text" value="<?= $data['nama_pembeli']; ?>" readonly>

            <label for="banyak">Banyak</label>
            <input type="text" name="banyak" value="<?= $data['banyak']; ?>" required>

            <label for="catatan">Catatan</label>
            <textarea name="catatan" cols="30" rows="4" required><?= $data['catatan']; ?></textarea>

            <label for="status">Status</label>
            <select name="status" required>
                <option value="Dikerjakan"     <?= $data['status'] == 'Dikerjakan'     ? 'selected' : '' ?>>Dikerjakan</option>
                <option value="Desain Selesai" <?= $data['status'] == 'Desain Selesai' ? 'selected' : '' ?>>Desain Selesai</option>
                <option value="Revisi"         <?= $data['status'] == 'Revisi'         ? 'selected' : '' ?>>Revisi</option>
                <option value="Dicetak"        <?= $data['status'] == 'Dicetak'        ? 'selected' : '' ?>>Dicetak</option>
                <option value="Selesai"        <?= $data['status'] == 'Selesai'        ? 'selected' : '' ?>>Selesai</option>
            </select>

            <button type="submit" name="update" class="btn edit">Update Pesanan</button>
            <a href="?page=pesanan" class="btn batal">Batal</a>
        </form>
    </div>
</div>