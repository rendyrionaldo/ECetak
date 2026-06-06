<?php
include 'Config/koneksi.php'; 

if (isset($_POST['submit'])){
    //1. ambil input dari form (asumsi nama input : un dan pw)
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)){
        echo "<script>alert ('Kolom tidak boleh kosong!!'); window.history.back();</script>";
        exit;
    }

    $query = mysqli_query($connect, "SELECT id, username, password, peran FROM user WHERE username = '$username'");

    if($data = mysqli_fetch_assoc($query)){
        if ($password == $data['password']){
            // Login Berhasil:simpan data ke session
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['peran'] = $data['peran'];
            $_SESSION['is_login'] = true;

            if ($data['peran'] == 'Admin') {
                header('Location: BackEnd/ad_index.php');
                exit;
            } elseif ($data['peran'] == 'Customer') {
                header('Location: index.php');
                exit;
            }
        } else {
            echo "<script>alert ('username atau password salah!');
                window.history.back();</script>";
                exit;
        }
    } else {
        echo "<script>alert('Username atau password salah!'); window.history.back();</script>";
        exit;
    }
}
?>

<div class="login-wrapper">
    <div class="login-card">

        <h1>Login Akun</h1>

        <form method="post" class="login-form">

            <label>Username</label>
            <input type="text" name="username" >

            <label>Password</label>
            <input type="password" name="password">

            <input type="submit" name="submit" value="LOGIN">
            <p>Belum punya akun? Daftar <a href="?page=daftar">di sini</a></p>
        </form>
    </div>
</div>
