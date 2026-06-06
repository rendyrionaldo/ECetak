<?php
include "../Config/koneksi.php";

// Cek apakah tombol simpan sudah diklik
if(isset($_POST['tambah'])){
    $nama   = $_POST['nama'];
    $deskripsi  = $_POST['deskripsi'];
    $harga  = $_POST['harga'];
    $file_name = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $folder = '../gambar/'.$file_name;

    //query untuk memasukan data ke tabel_produk
    

    if(move_uploaded_file($file_tmp, $folder)){

        $query = mysqli_query($connect, "INSERT INTO produk (nama,deskripsi,harga,gambar)
                                    VALUES ('$nama', '$deskripsi', '$harga', '$file_name')");
        if($query){    
            echo "<script>
                    alert ('Data berhasil ditambahkan!');
                    window.location.href = '?page=produk';
                  </script>";  
        } else {
            echo "<script>
                    alert ('Gagal menambahkan data: " .mysqli_error($connect)."');
                  </script>";  
        }          
    } else {
        echo "<script>
                alert ('Gagal Mengunggah gambar!');
              </script>";
    }
}
?>

<div class="backend-content">
    <div class="content">
        <h3>Tambah Produk Penjualan</h3>
        <p>Lengkapi Formulir ini untuk menambahkan produk baru ke dalam daftar penjualan.</p>
    </div>
    <div class="content2">
        <h3>Form Tambah Produk :</h3><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Produk:</label>
                <input type="text" name="nama" required><br>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" rows="4" required></textarea><br>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" required><br>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" required><br>
            </div>
            <button type="submit" name="tambah" class="btn tambah">Tambah Produk</button>
        </form>
    </div>
</div>