<?php
include '../Config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$get_data = mysqli_query($connect,"
    SELECT
        p.*,
        u.username AS nama_pembeli,
        pr.nama AS nama_produk
    FROM pesanan p
    JOIN user u ON p.id_user = u.id
    JOIN produk pr ON p.id_produk = pr.id
");
$data = mysqli_fetch_assoc($get_data);

//Jika tombol update diklik
if(isset($_POST['update'])){
    $file_admin = $_FILES['file_admin']['name'];
    $file_admin_tmp = $_FILES['file_admin']['tmp_name'];
    $status = $_POST['status'];
    $folder = '../gambar/'.$file_pembeli;
    
    $query = mysqli_query($connect, "UPDATE pesanan SET 
                                    file_admin='$file_admin',
                                    status='$status'
                                    WHERE id='$id'");

    if (!empty($_FILES['file_admin']['name'])) {
        $folder = "../gambar/";
        if (!is_dir($folder)) mkdir($folder, 0777, true);
        if (!empty($file_admin) && file_exists($folder . $file_admin)) unlink($folder . $file_admin);
        $file_admin = basename($_FILES['file_admin']['name']);
        move_uploaded_file($_FILES['file_admin']['tmp_name'], $folder . $file_admin);
    }
    
    if($query){
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = '?page=pesanan';
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
                <label>Produk</label>
                <input type="text" value="<?= $data['nama_produk']; ?>" readonly>
            </div>  
            <div class="form-group">
                <label for="file_admin">Gambar Desain:</label>
                <input type="file" value="../gambar/<?= $data['file_admin']; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" required>
                    <option value="Dikerjakan">Dikerjakan</option>
                    <option value="Desain Selesai">Desain Selesai</option>
                    <option value="Revisi">Revisi</option>
                    <option value="Dicetak">Dicetak</option>
                    <option value="Selesai">Selesai</option>
                </select><br>
            </div>
            <button type="submit" name="update" class="btn edit">Update Pesanan</button>
            <a href="?page=pesanan" class="btn hapus">Batal</a>
        </form>
    </div>
</div>