<?php 

$koneksi = mysqli_connect("localhost","root","","arkademy");


if(mysqli_connect_error()){
  echo "koneksi gagal" . mysqli_connect_error();
}


?>