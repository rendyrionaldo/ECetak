<?php
include '../Config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$get_data = mysqli_query($connect, "SELECT * FROM pesanan WHERE id='$id'");
$data = mysqli_fetch_assoc($get_data);

//Jika tombol update diklik
if(isset($_POST['update'])){
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
    
    $query = mysqli_query($connect, "UPDATE pesanan SET 
                                    pembeli='$pembeli',
                                    produk='$produk',
                                    tema='$tema',
                                    ukuran='$ukuran',
                                    banyak='$banyak',
                                    file_pembeli='$file_pembeli',
                                    catatan='$catatan',
                                    status='$status'
                                    WHERE id='$id'");

    if (!empty($_FILES['gambar']['name'])) {
        $folder = "../gambar/";
        if (!is_dir($folder)) mkdir($folder, 0777, true);
        if (!empty($foto) && file_exists($folder . $foto)) unlink($folder . $foto);
        $foto = basename($_FILES['gambar']['name']);
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