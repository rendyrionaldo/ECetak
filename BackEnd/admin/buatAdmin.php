<?php

include '../Config/koneksi.php';

if(isset($_POST['simpan'])){
    $un   = $_POST['un'];
    $pw   = $_POST['pw'];
    $peran = $_POST['peran'];

    $query = mysqli_query($connect, "INSERT INTO user (un, pw, peran)
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
                <label>Username :</label><br>
                <input type="text" name="un" required placeholder="Masukkan Username">
            </div>
            <br>
            <div class="form-group">
                <label>Password :</label><br>
                <input type="password" name="pw" required placeholder="Masukkan Password Anda">
            </div>
            <br>
            <div class="form-group">
                <label>Peran :</label><br>
                <select name="peran" required>
                    <option value="">Pilih Peran</option>
                    <option value="Admin">Admin</option>
                    <option value="Customer">Customer</option>
                </select>
            </div>
            <br>
            <button type="submit" name="simpan" class="btn tambah">Simpan Data</button>
            <a href="?page=admin" class="btn edit">Kembali</a>
        </form>
    </div>
</div>