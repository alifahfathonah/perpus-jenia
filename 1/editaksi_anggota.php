<?php
// koneksi database
include 'connect.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$status_aktif = $_POST['status_aktif'];
 
// update data ke database
 if(!empty($_POST[password])){
mysqli_query($koneksi,"update anggota set nama='$nama', alamat='$alamat', telepon='$telepon', email='$email', status_aktif='$status_aktif' where id_anggota='$id'");
 
// mengalihkan halaman kembali ke 
 header("location:anggota.php");
?>