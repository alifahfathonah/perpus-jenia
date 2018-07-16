<?php 
// koneksi database
include 'connect.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
// $nim = $_POST['nim'];
// $alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into kategori values('','$nama')");

// mengalihkan halaman kembali ke index.php
header("location:kategori.php");

?>