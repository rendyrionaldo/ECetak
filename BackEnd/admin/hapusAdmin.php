<?php
//koneksi tetap diperlukan ke query
include '../Config/koneksi.php';

//menangkap ID dari URl
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //query hapus data berdasarkan id
    $query = mysqli_query($connect, "DELETE FROM user WHERE id='$id'");

    if($query){
        echo "<script>
                alert('Data admin berhasil dihapus!');
                window.location.href = '?page=admin';
              </script>";
    } else{
            "<script>
                alert('Gagal menghapus data: " . mysqli_error($connect) . "';
                window.location.href = '?page=admin';
              </script>";
    }
} else{
    //jika tidak ada id di url, kembalikan ke halaman utama
    header("Location: ?page=admin");
}
?>