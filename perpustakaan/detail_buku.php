<!DOCTYPE html>
<html>
<head>
	<title>PERPUSTAKAAN</title>
</head>
<body>
<h1>Detail Buku</h1>
<?php
 include 'connect.php';
 $id = $_GET ['id'];
 $data = mysqli_query($koneksi, "SELECT nama, tahun_terbit, sinopsis from buku where id='$id'");
 while ($d = mysqli_fetch_array($data)) {
 ?>
 	<table border="1" width="100%">
 		<tr>
 			<td>nama</td>
 			<td><?php echo $d['nama']; ?></td>
 		</tr>
 		<tr>
 			<td>tahun terbit</td>
 			<td><?php echo $d['tahun_terbit']; ?></td>
 		</tr>
 		<tr>
			<td>sinopsis</td>
			<td><?php echo $d['sinopsis']; ?></td>
		</tr>
	</table>
 <?php } ?>


</body>
</html>