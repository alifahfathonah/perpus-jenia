<?php 
// koneksi database
include 'connect.php';
 
// menangkap data yang di kirim dari form
$id = $_GET['id'];
 
// update data ke database
mysqli_query($koneksi," delete from buku where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:buku.php");
 
?>