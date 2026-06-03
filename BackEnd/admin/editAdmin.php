<?php
include '../Config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$get_data = mysqli_query($connect, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_assoc($get_data);

//Jika tombol update diklik
if(isset($_POST['update'])){
    $un   = $_POST['un'];
    $pw   = $_POST['pw'];
    $peran = $_POST['peran'];

    $query = mysqli_query($connect, "UPDATE user SET 
                                    un='$un', 
                                    pw='$pw',
                                    peran='$peran'
                                    WHERE id='$id'");

    if($query){
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = '?page=admin';
              </script>";
    }
}
?>

<div class="content">
    <div class="desc-content">
        <h3>Ubah Data Admin</h3>
        <p>Silahkan isi formulir di bawah ini untuk mengubah data admin.</p>
    </div>

    <div class="desc-content">
        <h3>Form Ubah Data Admin</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label>Username :</label><br>
                <input type="text" name="un" value="<?=$data['un']; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label>Password :</label><br>
                <input type="password" name="pw" value="<?= $data['pw']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn edit">Update Data</button>
            <a href="?page=admin" class="btn hapus">Batal</a>
        </form>
    </div>
</div>