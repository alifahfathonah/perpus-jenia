<?php 
// koneksi database
include 'connect.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$alamat = $_POST['telepon'];
$email = $_POST['email'];

// update data ke database
mysqli_query($koneksi,"update penerbit set nama='$nama', alamat='$alamat', telepon='$telepon', email='$email' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:penerbit.php");

?>