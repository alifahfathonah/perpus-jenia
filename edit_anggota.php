<!DOCTYPE html>
<html>
<head>
	<title>PERPUSTAKAAN</title>
</head>
<body>
 
	<br/>
	<a href="anggota.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA ANGGOTA</h3>
 
	<?php
	include 'connect.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"SELECT * FROM anggota WHERE id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form action="editaksi_anggota.php" method="post">
			<table>
				<tr>			
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
						<input type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
						<input type="text" name="telepon" value="<?php echo $d['telepon']; ?>">
						<input type="text" name="email" value="<?php echo $d['email']; ?>">
						<?php
						$anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$d[id]'");
						$id = mysqli_fetch_array($anggota);
						$namaanggota = $id['nama'];
						?>
						<select name="status_aktif">
							<option>Aktif</option>
							<option>Tidak Aktif</option>
						</select>
				
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