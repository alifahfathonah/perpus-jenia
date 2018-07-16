<?php 
// koneksi database
include 'connect.php';
 
// menangkap data yang di kirim dari form
$id 			= $_POST['id'];
$nama 			= $_POST['nama'];
$tahun_terbit	= $_POST['tahun_terbit'];
$penulis		= $_POST['penulis'];
$penerbit		= $_POST['penerbit'];
$kategori		= $_POST['kategori'];
$sinopsis		= $_POST['sinopsis'];
$sampul			= $_POST['sampul'];
$berkas			= $_POST['berkas'];
 
// update data ke database
mysqli_query($koneksi,"update kategori set nama='$nama', tahun_terbit='$tahun_terbit', penulis='$penulis', penerbit='$penerbit', kategori='$kategori', sinopsis='$sinopsis', sampul='$sampul', berkas='$berkas'  where id='$id'");
 
// mengalihkan halaman kembali ke 
header("location:buku.php");
 
?>