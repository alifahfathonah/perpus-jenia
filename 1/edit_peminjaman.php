<html>
<title>PERPUSTAKAAN</title>
<?php
                    include "connect.php";

                    if (isset($_GET['id'])) {

                    $id = ($_GET["id"]);

                    $query = "SELECT * FROM peminjaman WHERE id='$id'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    }

                    $data = mysqli_fetch_assoc($result);
                                    
                    } else {

                    header("location:peminjaman.php");
                    }
                ?>

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
<body>

  <h1>Edit Data Peminjaman</h1>
    <div class="container">
      <form action="editaksi_peminjaman.php" enctype="multipart/form-data" method="POST" >

<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
<label>Nama Buku</label>
<select name="buku">
 <?php
 $query = "SELECT * FROM buku";
 $hasil = mysqli_query($koneksi, $query);
 $tampil = mysqli_num_rows($hasil);

    if ( $tampil> 0) {
      while ( $dat = mysqli_fetch_assoc($hasil)) {
           if($dat['id']==$data['id_buku']){
  ?>
 <option value="<?php echo $dat['id']; ?>" selected="selected"><?php echo $dat['nama'];?></option>
  <?php
     }else{
  ?>
  <option value="<?php echo $dat['id']; ?>"><?php echo $dat['nama']; ?></option>
  <?php
        }
      }
  }
  ?>
</select>

 <label>Nama Anggota</label>
<select name="anggota">
 <?php
 $query = "SELECT * FROM anggota";
 $hasil = mysqli_query($koneksi, $query);
 $tampil = mysqli_num_rows($hasil);

    if ( $tampil> 0) {
      while ( $dat = mysqli_fetch_assoc($hasil)) {
           if($dat['id']==$data['id_anggota']){
  ?>
 <option value="<?php echo $dat['id']; ?>" selected="selected"><?php echo $dat['nama'];?></option>
  <?php
     }else{
  ?>
  <option value="<?php echo $dat['id']; ?>"><?php echo $dat['nama']; ?></option>
  <?php
        }
      }
  }
  ?>
</select>

   <label>Tanggal Pinjam</label>
  <input type="date" name="tanggal_pinjam" value="<?php echo $data['tanggal_pinjam']; ?>"><br>
  <label>Tanggal Kembali</label>
  <input type="date" name="tanggal_kembali" value="<?php echo $data['tanggal_kembali']; ?>"><br>
<input type=submit value=Update>
</form>
</div>
</body>
</html>