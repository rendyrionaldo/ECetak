<?php

include '../Config/koneksi.php';

if(isset($_POST['simpan'])){
    $un   = $_POST['username'];
    $pw   = $_POST['password'];
    $peran = $_POST['peran'];

    $query = mysqli_query($connect, "INSERT INTO user (username, password, peran)
                                    VALUES ('$un', '$pw', '$peran')");

    if($query){
        echo "<script>
                alert ('Data berhasil ditambahkan!');
                window.location.href = '?page=admin';
              </script>";              
    } else {
        echo "<script>
                alert ('Gagal menambahkan data: " .mysqli_error($connect)."');
              </script>";
    }
}
?>

<div class="backend-content">
    <div class="content">
        <h3>Tambah Data Admin</h3>
        <p>Silahkan isi formulir di bawah ini untuk menambah data admin baru.</p>
    </div>

    <div class="content2">
        <form action="" method="POST">
            <div class="form-group">
                <label>Username :</label>
                <input type="text" name="username" required placeholder="Masukkan Username"><br>
            </div>
            
            <div class="form-group">
                <label>Password :</label>
                <input type="password" name="password" required placeholder="Masukkan Password Anda"><br>
            </div>
            
            <div class="form-group">
                <label>Peran :</label>
                <select name="peran" required>
                    <option value="">Pilih Peran</option>
                    <option value="Admin">Admin</option>
                    <option value="Customer">Customer</option>
                </select><br>
            </div>
            <button type="submit" name="simpan" class="btn tambah">Simpan Data</button>
            <a href="?page=admin" class="btn edit">Kembali</a>
        </form>
    </div>
</div>