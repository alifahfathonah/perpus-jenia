<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<br/>
	<a href="penerbit.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH DATA PENERBIT</h3>
	<form action="tambahaksi_penerbit.php" method="post">
		<table>
			<tr>			
				<td>NAMA PENERBIT</td>
				<td><input type="text" name="nama" required=""></td>
			</tr>
			<td>ALAMAT</td>
			<td><textarea name="alamat"></textarea></td>
			<tr>
				<td>Telepon</td>
				<td><input type="text" name="telepon"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>	
			<tr>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
		</table>
	</form>
</body>
</html>