<?php
include('connect.php');

$nama_buku				= $_POST['buku'];
$nama_anggota 			= $_POST['anggota'];
$tanggal_pinjam 		= $_POST['tanggal_pinjam'];
$tanggal_kembali		= $_POST['tanggal_kembali'];



mysqli_query($koneksi, "INSERT INTO peminjaman (id_buku, id_anggota, tanggal_pinjam, tanggal_kembali)VALUES ('$nama_buku' , '$nama_anggota', '$tanggal_pinjam', '$tanggal_kembali')");
	header('location:peminjaman.php');

header("location:peminjaman.php");
?>