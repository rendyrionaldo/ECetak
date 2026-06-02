<?php

$DB_Host = "localhost";
$DB_User = "root";
$DB_Password = "";
$DB_Name = "tubesweb";
$connect = mysqli_connect($DB_Host, $DB_User, $DB_Password, $DB_Name);


if(mysqli_connect_error()){
    echo 'Gagal melakukan koneksi ke Database : ' .mysqli_connect_error();
} else {
    echo '';
}
?>