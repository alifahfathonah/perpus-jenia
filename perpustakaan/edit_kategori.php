<!DOCTYPE html>
<html>
<head>
	<title>PERPUSTAKAAN</title>
</head>
<body>
 
	<br/>
	<a href="kategori.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA KATEGORI</h3>
 
	<?php
	include 'connect.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from kategori where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="editaksi_kategori.php">
			<table>
				<tr>			
					<td>Nama</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>
 
</body>
</html>