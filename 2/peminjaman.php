 <?php 
  include '../config/connect.php';
  session_start();
  if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
  }
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>PERPUSTAKAAN</title>
	 <meta charset="utf-8">
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
</head>
<body id="page-top">
	<div class="container">
		<!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">PERPUSTAKAAN WEBSITE</span>
        <span class="d-none d-lg-block"></span>
      </a>

       <aside>
      <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <?php include "konten/navbar.php";?>
      </div>
      </aside>
    </nav>
	<br/>
	<label>Search: <input type="search"></label>
	<br/>
	<br/>
	<table class="table table-hover" <!-- style="width: 3500px;" -->  
		<thead>
		<tr>
			<th>NO.</th>
			<th>Nama Buku</th>
			<th>Nama Anggota</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Aksi</th>
		</tr>
		
		<?php 
		include '../config/connect.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from peminjaman ");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
			
				<?php
				$buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$d[id_buku]'");
				$id = mysqli_fetch_array($buku);
				$namabuku = $id['nama'];
				?>
				<td><?php echo $namabuku; ?></td>
				
				<?php
				$anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$d[id_anggota]'");
				$id = mysqli_fetch_array($anggota);
				$namaanggota = $id['nama'];
				?>
				<td><?php echo $namaanggota; ?></td>

				<td><?php echo $d['tanggal_pinjam']; ?></td>
				<td><?php echo $d['tanggal_kembali']; ?></td>

				<td>
					<a href="edit_peminjaman.php?id=<?php echo $d['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="hapus_peminjaman.php?id=<?php echo $d['id']; ?>"onclick="return confirm('Data akan di hapus?');""><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
			<?php 
		}
		?>
</thead>
	</table>
</body>
</html>