<?php
  $host = "localhost"; 
  $user = "lpikmasu";
  $pass = "Fakhri1411!";
  $nama_db = "lpikmasu_dbberita2"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }
?>