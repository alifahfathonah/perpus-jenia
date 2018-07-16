<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<br/>
	<a href="anggota.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH DATA ANGGOTA</h3>
	<form action="tambahaksi_anggota.php" method="post">
		<table>
			<tr>			
				<td>NAMA</td>
				<td><input type="text" name="nama" required=""></td>
			</tr>
			<td>ALAMAT</td>
			<td><textarea name="alamat"></textarea></td>
			<tr>
				<td>TELEPON</td>
				<td><input type="text" name="telepon"></td>
			</tr>
			<tr>
				<td>EMAIL</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>STATUS</td>
				<td><select name="status_aktif">
					<option>Aktif</option>
					<option>Tidak Aktif</option>
				</select></td>
			</tr>	
			<tr>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
		</table>
	</form>
</body>
</html>