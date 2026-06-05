<?php
include 'Config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? 0;
$user = $_SESSION['user_id'];

//Jika tombol update diklik
if(isset($_POST['batal'])){
    
    $query = mysqli_query($connect, "UPDATE pesanan SET 
                                    status = 'Dibatalkan'
                                    WHERE id='$id' AND id_user='$user'");
    
    if($query){
        echo "<script>
                alert('Pesanan Dibatalkan!');
                window.location.href = '?page=pesanan';
              </script>";
    }
}
?>

<div class="confirm-wrapper">
    <div class="confirm-card">
        <h2>Batalkan Pesanan?</h2>
        <p>
            Apakah Anda yakin ingin membatalkan pesanan ini?
        </p>

        <div class="confirm-action">
        <form method="POST">
            <button type="submit" name="batal" class="btn-cancel">Ya, Batalkan</button>

            <a href="?page=pesanan"
               class="btn-no">
               Tidak
            </a>
        </form>
        </div>

    </div>
</div>