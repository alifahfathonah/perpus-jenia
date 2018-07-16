<!DOCTYPE html>
<html>
<head>
	<title>PERPUSTAKAAN</title>
</head>
<body>
 
	<br/>
	<a href="penulis.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA PENULIS</h3>
 
	<?php
	include 'connect.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from penulis where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="editaksi_penulis.php">
			<table>
				<tr>			
					<td>
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
						<input type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
						<input type="text" name="telepon" value="<?php echo $d['telepon']; ?>">
						<input type="text" name="email" value="<?php echo $d['email']; ?>">
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