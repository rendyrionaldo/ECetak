<?php
include "Config/koneksi.php";
if (!isset($_SESSION['user_id'])) {
    echo "
    <script>
        alert('Silakan login terlebih dahulu untuk melakukan pemesanan!');
        window.location.href='?page=login';
    </script>
    ";
    exit;
}

if(isset($_POST['pesan'])){
    $pembeli = $_SESSION['user_id'];
    $produk = $_POST['id_produk'];
    $ukuran = $_POST['ukuran'];
    $banyak = $_POST['banyak'];
    $file_pembeli = $_FILES['file_pembeli']['name'];
    $file_tmp = $_FILES['file_pembeli']['tmp_name'];
    $catatan = $_POST['catatan'];
    $folder = 'gambar/'.$file_pembeli;

    if(move_uploaded_file($file_tmp, $folder)){   
            mysqli_query($connect, "INSERT INTO pesanan(id_user,id_produk, ukuran, banyak,          file_pembeli, catatan)
                        VALUES('$pembeli', '$produk', '$ukuran', '$banyak', '$file_pembeli', '$catatan')");
    
                echo "<script>
                    alert ('Data berhasil ditambahkan!');
                    window.location.href = '?page=produk';
                  </script>";  
        } else {
        echo "<script>
                alert ('Gagal Mengunggah gambar!');
              </script>";
    }
}
$id = $_GET['id'] ??'';
$get_data = mysqli_query($connect, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($get_data);
?>

<div class="pesanan-content">
        <div class="pesanan-card">
                <h1>Buat Pesanan</h1>
                <form method="POST" enctype="multipart/form-data" class="pesanan-form">
                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">

                        <label>Produk</label>
                        <input type="text" value="<?= $data['nama']; ?>" readonly>

                        <label for="">Ukuran</label>
                        <input type="text" name="ukuran" placeholder="Ukuran khusus spanduk...">
                        
                        <label for="">Banyak</label>
                        <input type="text" name="banyak" placeholder="Jumlah pesanan...">
                        
                        <label for="">File Pembeli</label>
                        <input type="file" name="file_pembeli" placeholder="Unggal file contoh (png/jpg/jpeg)">
                        
                        <label for="">Catatan</label>
                        <textarea name="catatan" cols="30" rows="4" placeholder="Masukkan catatan tambahan..."></textarea> 

                        <button type="submit" name="pesan" class="btn tambah">Tambah Pesanan</button>
                </form>
        </div>
</div>