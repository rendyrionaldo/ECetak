<?php
include '../Config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$get_data = mysqli_query($connect, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_assoc($get_data);

//Jika tombol update diklik
if(isset($_POST['update'])){
    $un   = $_POST['username'];
    $pw   = $_POST['password'];

    $query = mysqli_query($connect, "UPDATE user SET 
                                    username='$un', 
                                    password='$pw'
                                    WHERE id='$id'");

    if($query){
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = '?page=admin';
              </script>";
    }
}
?>

<div class="backend-content">
    <div class="content">
        <h3>Ubah Data Admin</h3>
        <p>Silahkan isi formulir di bawah ini untuk mengubah data admin.</p>
    </div>

    <div class="content2">
        <h3>Form Ubah Data Admin</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label>Username :</label>
                <input type="text" name="username" value="<?=$data['username']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password :</label>
                <input type="password" name="password" value="<?= $data['password']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn edit">Update Data</button>
            <a href="?page=admin" class="btn hapus">Batal</a>
        </form>
    </div>
</div>