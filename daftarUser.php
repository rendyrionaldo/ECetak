<?php

include 'Config/koneksi.php';

if(isset($_POST['submit'])){
    $un   = $_POST['username'];
    $pw   = $_POST['password'];

    $query = mysqli_query($connect, "INSERT INTO user (username, password)
                                    VALUES ('$un', '$pw')");

    if($query){
        echo "<script>
                alert ('Daftar Berhasil!');
                window.location.href = '?page=login';
              </script>";              
    } else {
        echo "<script>
                alert ('Gagal Daftar: " .mysqli_error($connect)."');
              </script>";
    }
}
?>

<div class="login-wrapper">
    <div class="login-card">

        <h1>Daftar Akun</h1>

        <form method="post" class="login-form">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input type="submit" name="submit" value="DAFTAR">
            <p>Sudah punya akun? Login <a href="?page=login">di sini</a></p>
        </form>
    </div>
</div>