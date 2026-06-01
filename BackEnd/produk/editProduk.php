<?php
include '../Config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$get_data = mysqli_query($connect, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($get_data);

//Jika tombol update diklik
if(isset($_POST['update'])){
    $nama   = $_POST['nama'];
    $deskripsi  = $_POST['deskripsi'];
    $harga  = $_POST['harga'];
    $foto = $data['gambar']; // Ambil nama file gambar lama dari database

    $query = mysqli_query($connect, "UPDATE produk SET 
                                    nama='$nama', 
                                    deskripsi='$deskripsi', 
                                    harga='$harga', 
                                    gambar='$foto' 
                                    WHERE id='$id'");

    if (!empty($_FILES['gambar']['name'])) {
        $folder = "../../gambar/";
        if (!is_dir($folder)) mkdir($folder, 0777, true);
        if (!empty($foto) && file_exists($folder . $foto)) unlink($folder . $foto);
        $foto = uniqid() . '_' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $foto);
    }
    
    if($query){
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = '?page=produk';
              </script>";
    }
}
?>

<div class="backend-content">
    <div class="tambah-content">
        <h3>Edit Produk Penjualan</h3>
        <p>Lengkapi Formulir ini untuk mengedit produk yang sudah ada.</p>
    </div>
    <div class="tambah-content">
        <h3>Form Edit Produk :</h3><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Produk:</label><br>
                <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br><br>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label><br>
                <textarea name="deskripsi" rows="4" value="<?= $data['deskripsi']; ?>" required></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label><br>
                <input type="number" name="harga" value="<?= $data['harga']; ?>" required><br><br>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label><br>
                <?php if ($data['gambar']): ?>
                    <img src="../../gambar/<?= $data['gambar'] ?>"><br>
                <?php endif; ?>
                <input type="file" name="gambar" required><br><br>
            </div>
            <button type="submit" name="update" class="btn update">Update Produk</button>
        </form>
</div>