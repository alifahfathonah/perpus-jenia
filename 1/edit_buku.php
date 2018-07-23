<html>
<title>PERPUSTAKAAN</title>
<?php
                    include "connect.php";

                    if (isset($_GET['id'])) {

                    $id = ($_GET["id"]);

                    $query = "SELECT * FROM buku WHERE id='$id'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    }

                    $data = mysqli_fetch_assoc($result);
                                    
                    } else {

                    header("location:buku.php");
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

  <h1>Edit Data Buku</h1>
    <div class="container">
      <form action="editaksi_buku.php" enctype="multipart/form-data" method="POST" >
  <label>nama buku</label>
  <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
  <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
  <label>Tahun Terbit</label>
  <input type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>"><br>

   
<label>Penulis</label>
<select name="penulis">
 <?php
 $query = "SELECT * FROM penulis";
 $hasil = mysqli_query($koneksi, $query);
 $tampil = mysqli_num_rows($hasil);

    if ( $tampil> 0) {
      while ( $dat = mysqli_fetch_assoc($hasil)) {
           if($dat['id']==$data['id_penulis']){
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

 <label>Penerbit</label>
<select name="penerbit">
 <?php
 $query = "SELECT * FROM penerbit";
 $hasil = mysqli_query($koneksi, $query);
 $tampil = mysqli_num_rows($hasil);

    if ( $tampil> 0) {
      while ( $dat = mysqli_fetch_assoc($hasil)) {
           if($dat['id']==$data['id_penerbit']){
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

    <label>Kategori</label><br>
<select name="kategori">
  <?php
 $query = "SELECT * FROM kategori";
 $hasil = mysqli_query($koneksi, $query);
 $tampil = mysqli_num_rows($hasil);

    if ( $tampil> 0) {
      while ( $dat = mysqli_fetch_assoc($hasil)) {
           if($dat['id']==$data['id_kategori']){
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
</select><br><br>

  sampul yang di upload: 
   <img style="width: 200px; height: 200px" src="<?php echo $data['sampul']; ?>"><br><br>
    <input type="hidden" name="sampul_buku_awal" value="<?php echo $data['sampul']?>">
  <input type="file" name="sampul"><br>
Berkas yang di upload :  <a href="<?php echo $data['berkas']?>"><?php echo $data['berkas']?></a><br>
                            <input type="hidden" name="berkas_buku_awal" value="<?php echo $data['berkas']?>">
                            <input type="file" name="berkas"><br>
Sinopsis:
<textarea class="form-control " id="ccomment" name="sinopsis" required=""><?php echo $data['sinopsis']; ?></textarea><br><br>
<input type=submit value=Upload>
</form>
</div>
</body>
</html>