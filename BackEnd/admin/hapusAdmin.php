<?php
include '../Config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

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
    header("Location: ?page=admin");
}
?>