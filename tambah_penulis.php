 <?php 
  include 'connect.php';
  session_start();
  if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
  }
  ?>

<!DOCTYPE html>
<html>
<head>
  <title>PERPUSTAKAAN</title>

  <style>
  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}
  </style>

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

  <a href="penulis.php"><button type="button" class="btn btn-warning">Kembali</button></a><br><br>

  <br/>
  <br/>
  <form action="tambahaksi_penulis.php" method="post">
     <input type="hidden" name="id">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="nama" placeholder="nama">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="alamat" placeholder="alamat" >
    </div>
  </div><br><br>
  <div class="row">
    <div class="col">
    <input type="text" class="form-control" name="email" placeholder="email">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="telepon" placeholder="telepon">
    <input type=submit value=Simpan><br>
</div>
</form>
</body>
</html>