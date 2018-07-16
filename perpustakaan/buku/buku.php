<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
 	
	<br/>
	<a href="tambah_buku.php"><button type="button" class="btn btn-warning">tambah buku</button></a>
	
	<br/>
	<br/>
	<table class="table table-hover" style="width: 3000px;" >
		<thead>
		<tr>
			<th>NO.</th>
			<th>Nama</th>
			<th>Tahun Terbit</th>
			<th>Sinopsis</th>
			<th>Sampul</th>
			<th>Berkas</th>
			<th>Aksi</th>
		</tr>
		
		<?php 
		include 'connect.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from buku");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['tahun_terbit']; ?></td>
				<td><?php echo $d['sinopsis']; ?></td>
				<td><?php echo $d['sampul']; ?></td>
				<td><?php echo $d['berkas']; ?></td>
				<td>
					<a href="edit_kategori.php?id=<?php echo $d['id']; ?>">EDIT</a>
					<a href="hapus_kategori.php?id=<?php echo $d['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
</thead>
	</table>
</body>
</html>