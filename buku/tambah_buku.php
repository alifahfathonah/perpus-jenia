<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH DATA BUKU</h3>
	<form action="tambahaksi_buku.php" method="post">
		<table>
			<tr>			
				<td></td>
				<td><input type="text" name="nama" required="" placeholder="nama"></td>
				<td><div class="col-md-10">
					<input type="text" name="tahun_terbit" required="" placeholder="tahun terbit"></div></td>
				<td><input type="text" name="sinopsis" required="" placeholder="sinopsis" height="90"></td>
				 <div class="col-md-2">
                                    Gambar
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar"></div>
                                </div>
			</tr>
			<!-- <tr>
				<td>NIM</td>
				<td><input type="number" name="nim"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr> -->
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>