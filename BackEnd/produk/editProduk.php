<?php
include '../Config/koneksi.php';

$id = $_GET['id'];
$get_data = mysqli_query($connect, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($get_data);

if (isset($_POST['update'])) {
    $nama      = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga     = $_POST['harga'];
    $foto      = $data['gambar'];

    if (!empty($_FILES['gambar']['name'])) {
        $folder = "../gambar/";
        if (!is_dir($folder)) mkdir($folder, 0777, true);

        if (!empty($foto) && file_exists($folder . $foto)) {
            unlink($folder . $foto);
        }

        $foto = basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $foto);
    }

    $query = mysqli_query($connect, "UPDATE produk SET 
                                    nama='$nama', 
                                    deskripsi='$deskripsi', 
                                    harga='$harga', 
                                    gambar='$foto' 
                                    WHERE id='$id'");
    if ($query) {
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = '?page=produk';
              </script>";
    }
}
?>

<div class="backend-content">
    <div class="content">
        <h3>Edit Produk Penjualan</h3>
        <p>Lengkapi Formulir ini untuk mengedit produk yang sudah ada.</p>
    </div>
    <div class="content2">
        <h3>Form Edit Produk :</h3><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Produk:</label>
                <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" rows="4" required><?= $data['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" value="<?= $data['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label>Foto Saat Ini:</label>
                <?php if (!empty($data['gambar'])): ?>
                    <a href="../gambar/<?= $data['gambar']; ?>" target="_blank">Foto Produk</a> 
                <?php else: ?>
                    <p style="color:#999; font-size:13px;">Belum ada foto</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="gambar">Ganti Foto (kosongkan jika tidak ingin diubah):</label>
                <input type="file" name="gambar" accept="image/*">
            </div>
            <button type="submit" name="update" class="btn edit">Update Produk</button>
            <a href="?page=produk" class="btn hapus">Batal</a>
        </form>
    </div>
</div>