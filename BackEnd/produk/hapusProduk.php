<?php
//koneksi tetap diperlukan ke query
include '../Config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($connect, "DELETE FROM produk WHERE id='$id'");

    if($query){
        echo "<script>
                alert('Data produk berhasil dihapus!');
                window.location.href = '?page=produk';
              </script>";
    } else{
            "<script>
                alert('Gagal menghapus data: " . mysqli_error($connect) . "';
                window.location.href = '?page=produk';
              </script>";
    }
} else{
    header("Location: ?page=produk");
}
?>