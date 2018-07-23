<?php
include '../config/connect.php';
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
<body><h1>Pinjam Buku</h1>
  <div class="container">
<form action="tambahaksipeminjaman.php" enctype="multipart/form-data" method="POST" >
   
<label>Nama Buku</label>
 <?php
    $read_buku = mysqli_query($koneksi, "select * from buku");
  ?>
<select name="buku">
  <option value="">---pilih buku---</option>
  <?php
  if ($read_buku->num_rows > 0) {
    while ($d=$read_buku->fetch_assoc()) { 
?>
<option value="<?=$d['id'];?>"><?=$d['nama'];?></option>
<?php
    }
  }
  ?>
</select>

 <label>Nama</label>
 <?php
    $read_anggota = mysqli_query($koneksi, "select * from anggota");
  ?>
<select name="anggota">
  <option value="">---pilih nama anggota---</option>
  <?php
  if ($read_anggota->num_rows > 0) {
   
    while ($d=$read_anggota->fetch_assoc()) {
?>
<option value="<?=$d['id'];?>"><?=$d['nama'];?></option>
<?php
    }
  }
  ?>
</select>
<label>Tanggal Pinjam</label>
  <input type="date" name="tanggal_pinjam"><br>
  <label>Tanggal Kembali</label>
  <input type="date" name="tanggal_kembali">

<input type=submit value=Pinjam>
</form>
</div>
</body>
</html>