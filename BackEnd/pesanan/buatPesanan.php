<?php
session_start();
include "../Config/koneksi.php";

if(isset($_POST['pesan'])){
    $pembeli = $_SESSION['id'];
    $produk = $_POST['id_produk'];
    $tema = $_POST['tema'];
    $ukuran = $_POST['ukuran'];
    $banyak = $_POST['banyak'];
    $file_pembeli = $_FILES['file_pembeli']['name'];
    $file_tmp = $_FILES['file_pembeli']['tmp_name'];
    $catatan = $_POST['catatan'];
    $status = 'menunggu';
    $folder = '../gambar/'.$file_pembeli;

    if(move_uploaded_file($file_tmp, $folder)){   
            echo "<script>
                    alert ('Data berhasil ditambahkan!');
                    window.location.href = '?page=produk';
                  </script>";  
        } else {
        echo "<script>
                alert ('Gagal Mengunggah gambar!');
              </script>";
    }

    mysqli_query($connect, "INSERT INTO pesanan(id_user,id_produk, tema, ukuran, banyak, file_pembeli, catatan, status)
        VALUES('$pembeli', '$produk', '$tema', '$ukuran', '$banyak', '$file_pembeli', '$catatan', '$status')");
}
?>

<div class="backend-content">
        <div class="content2">
                <form method="POST" enctype="multipart/form-data">
                        <label for="">Produk</label>
                        <input type="text" class="" placeholder="">
                        
                        <label for="">Tema</label>
                        <input type="text" class="" placeholder="">

                        <label for="">Ukuran</label>
                        <input type="text" class="" placeholder="">
                        
                        <label for="">Banyak</label>
                        <input type="text" class="" placeholder="">
                        
                        <label for="">File Pembeli</label>
                        <input type="file" class="" placeholder="">
                        
                        <label for="">Catatan</label>
                        <input type="text" class="" placeholder=""> 
                </form>
        </div>
</div>