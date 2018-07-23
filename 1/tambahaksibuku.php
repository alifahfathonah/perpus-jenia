<?php
include('connect.php');

$nama 			= $_POST['nama'];
$tahun_terbit 	= $_POST['tahun_terbit'];
$sinopsis 		= $_POST['sinopsis'];
$penerbit 		= $_POST['penerbit'];
$penulis 		= $_POST['penulis'];
$kategori 		= $_POST['kategori'];


$fileinfo = PATHINFO($_FILES["sampul"]["name"]);
$newFilename = $fileinfo['filename']. "_". time(). "." .$fileinfo['extension'];
move_uploaded_file($_FILES["sampul"]["tmp_name"], "img/". $newFilename);
$location = "img/". $newFilename;

$lokasi_file = $_FILES['berkas']['tmp_name'];
$nama_file   = $_FILES['berkas']['name'];
$folder = "berkas/$nama_file";

if (move_uploaded_file($lokasi_file,"$folder")) {
	mysqli_query($koneksi, "INSERT INTO buku (nama, tahun_terbit, id_penerbit, id_penulis, id_kategori, sinopsis, sampul, berkas)VALUES ('$nama' , '$tahun_terbit', '$penerbit', '$penulis', '$kategori','$sinopsis','$location','$folder')");
	header('location:buku.php');
}else{
	echo "gagal";
}
?>