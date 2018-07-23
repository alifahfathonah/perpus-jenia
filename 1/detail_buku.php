
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PERPUSTAKAAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<?php
 include 'connect.php';
 $id = $_GET ['id'];
 $data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
 while ($d = mysqli_fetch_array($data)) {
 ?>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <img style="width: 100%; " src="<?php echo $d['sampul']; ?>"> </div>
    <div class="col-sm-9">
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2><?php echo $d['nama']; ?></h2>
      <h5><span class="glyphicon glyphicon-time"></span> <?php echo $d['tahun_terbit']; ?></h5>

    <span class="label label-danger">
        <?php
        $penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id='$d[id_penerbit]'");
        $id = mysqli_fetch_array($penerbit);
        $namapenerbit = $id['nama'];
        ?>
          <?php echo $namapenerbit; ?></span>
        
    <span class="label label-danger">
      <?php
        $penulis = mysqli_query($koneksi, "SELECT * FROM penulis WHERE id='$d[id_penulis]'");
        $id = mysqli_fetch_array($penulis);
        $namapenulis = $id['nama'];
        ?>
        <?php echo $namapenulis; ?></span>
   
    <span class="label label-danger">
        <?php
        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$d[id_kategori]'");
        $id = mysqli_fetch_array($kategori);
        $namakategori = $id['nama'];
        ?>
        <?php echo $namakategori; ?> </span>
   <br><br>
    <a href="<?php echo $d['berkas']; ?>"><button type="button" class="btn btn-primary btn-sm">File Download disini</button></a>
    <h3>"<?php echo $d['sinopsis']; ?>"</h3>
     
  
  <a href="buku.php"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
  <footer>
  <p align="center">IT support Polindra</p>
</footer>
</div></div>
 

 <?php } ?>
</body>
</html>
