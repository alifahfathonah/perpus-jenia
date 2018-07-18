   <?php
                  include 'connect.php';

                  if (isset($_GET['id'])) {
                    
                    $id = ($_GET["id"]);

                    $query = "SELECT * FROM penerbit WHERE id='$id'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                      die ("Query Error: ".mysqli_errno($koneksi).
                         " - ".mysqli_error($koneksi));
                    }

                    $data 	= mysqli_fetch_assoc($result);

                    $nama 	= $data["nama"];
                    $alamat = $data['alamat'];
					$telepon= $data['telepon'];
					$email 	= $data['email'];
                    
                  } else {

                    header("location:penerbit.php");
                  }

              ?>

<!DOCTYPE html>
<html>
<head>
	<title>PERPUSTAKAAN</title>
</head>
<body>
 
	<br/>
	<a href="penerbit.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA PENERBIT</h3>
 
		<form method="post" action="editaksi_penerbit.php">
			<table>
				<tr>			
					<td>
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
						<input type="text" name="nama" value="<?php echo $data['nama']; ?>">
						<input type="text" name="alamat" value="<?php echo $data['alamat']; ?>">
						<input type="text" name="telepon" value="<?php echo $data['telepon']; ?>">
						<input type="text" name="email" value="<?php echo $data['email']; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN" name="edit"></td>
				</tr>		
			</table>
		</form>
 
</body>
</html>