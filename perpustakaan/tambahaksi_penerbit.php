<?php 
// koneksi database
include 'connect.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
// $nim = $_POST['nim'];
// $alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into penerbit values('','$nama', '$alamat', '$telepon', '$email')");

// mengalihkan halaman kembali ke index.php
header("location:penerbit.php");

?>