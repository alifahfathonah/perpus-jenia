<?php
include 'connect.php';
?>


<html>
<title>PERPUSTAKAAN</title>
<style>
  * {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

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

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
<body><h1>Tambah Data Buku</h1>
  <div class="container">
<form action="tambahaksibuku.php" enctype="multipart/form-data" method="POST" >
  <label>nama buku</label>
	<input type="text" name="nama"><br>
  <label>Tahun Terbit</label>
	<input type="text" name="tahun_terbit"><br>

   
<label>Penulis</label>
 <?php
    $read_penulis = mysqli_query($koneksi, "select * from penulis");
  ?>
<select name="penulis">
  <option value="">---pilih penulis---</option>
  <?php
  if ($read_penulis->num_rows > 0) {
    while ($d=$read_penulis->fetch_assoc()) { 
?>
<option value="<?=$d['id'];?>"><?=$d['nama'];?></option>
<?php
    }
  }
  ?>
</select>

 <label>Penerbit</label>
 <?php
    $read_penerbit = mysqli_query($koneksi, "select * from penerbit");
  ?>
<select name="penerbit">
  <option value="">---pilih penerbit---</option>
  <?php
  if ($read_penerbit->num_rows > 0) {
   
    while ($d=$read_penerbit->fetch_assoc()) {
?>
<option value="<?=$d['id'];?>"><?=$d['nama'];?></option>
<?php
    }
  }
  ?>
</select>

    <label>Kategori</label><br>
  <?php
    $read_kategori = mysqli_query($koneksi, "select * from kategori");
  ?>
<select name="kategori">
  <option value="">---pilih kategori---</option>
  <?php
  if ($read_kategori->num_rows > 0) {
    while ($d=$read_kategori->fetch_assoc()) {
?>
<option value="<?=$d['id'];?>"><?=$d['nama'];?></option>
<?php
    }
  }
  ?>
</select>

	sampul yang di upload: 
	<input type="file" name="sampul"><br>
Berkas yang di upload : <input type="file" name="berkas"><br>
Sinopsis:
<textarea name="sinopsis" rows="8" cols="40"></textarea><br>
<input type=submit value=Upload>
</form>
</div>
</body>
</html>