<?php 
// koneksi database 
	include "connect.php";

	$nam = $_POST['nama'];
	$tah = $_POST['tahun_terbit'];
	$pen = $_POST['penerbit'];
	$pel = $_POST['penulis'];
	$kat = $_POST['kategori'];
	$sin = $_POST['sinopsis'];

	$sam = $_POST['sampul_buku_awal'];
	$ber = $_POST['berkas_buku_awal'];
	
	$sampul = "../../../img/$sam";
	$berkas = "../../../berkas/$ber";

	echo $nam;
	echo $tah;
	echo $pen;
	echo $pel;
	echo $kat;
	echo $sin;
	exit();
	if (empty($_FILES['sampul']['name'])) {
			if (empty($_FILES['berkas']['name'])){
    				mysqli_query($koneksi, "UPDATE buku SET nama 	= '$nam',
														 tahun_terbit = '$tah',
														 id_penerbit  = '$pen',
														 id_penulis   = '$pel',
														 id_kategori  = '$kat',
														 sinopsis	  = '$sin'
    													 WHERE id     = '$_POST[id]'");
					header('location:buku.php');
				}
			else {
				unlink($berkas);
				$folder	    	= '../../../berkas/';
				$berkas_type	= array('doc','docx','xls','xlsx','pdf');
				$berkas_buku	= $nam."_".$_FILES['berkas']['name'];
				$e 				= explode('.', $berkas_buku);
				$ekst 			= strtolower(end($e));
				if(in_array($ekst, $berkas_type) === true){
				move_uploaded_file($_FILES['berkas']['tmp_name'], $folder.$berkas_buku);	
					mysqli_query($koneksi, "UPDATE buku SET nama 	   = '$nam',
														 tahun_terbit  = '$tah',
														 id_penerbit   = '$pen',
														 id_penulis    = '$pel',
														 id_kategori   = '$kat',
														 sinopsis	   = '$sin',
    													 berkas        = '$berkas_buku'
    													 WHERE id      = '$_POST[id]'");
				}
				else{
					echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); onclick=self.history.back()</script>";
				}
			  	header('location:buku.php');
			}
		}
		if (empty($_FILES['berkas']['name'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama 					= $nam."_".$_FILES['sampul']['name'];
			$x 						= explode('.', $nama);
			$ekstensi 				= strtolower(end($x));
			$ukuran					= $_FILES['sampul']['size'];
			$file_tmp 				= $_FILES['sampul']['tmp_name'];
			
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 2000000){
					unlink($sampul);
					move_uploaded_file($file_tmp, '../../../img/'.$nama);
					mysqli_query($koneksi, "UPDATE buku SET nama 	   = '$nam',
														 tahun_terbit  = '$tah',
														 id_penerbit   = '$pen',
														 id_penulis    = '$pel',
														 id_kategori   = '$kat',
														 sinopsis	   = '$sin',
    													 sampul 	   = '$nama'
    													 WHERE id      = '$_POST[id]'");
				}
				else{
					echo "<script>alert('Ukuran Gambar Terlalu Besar!'); onclick=self.history.back()</script>";
				}   
			 }
			else{
				echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); onclick=self.history.back()</script>";
			}
			header('location:buku.php');

		}
		else {

			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama 					= $nam."_".$_FILES['sampul']['name'];
			$x 						= explode('.', $nama);
			$ekstensi 				= strtolower(end($x));
			$ukuran					= $_FILES['sampul']['size'];
			$file_tmp 				= $_FILES['sampul']['tmp_name'];
			
			unlink($berkas);			
			$folder			= '../../../berkas/';
			$berkas_type	= array('doc','docx','xls','xlsx','pdf');
			$berkas_buku	= $nam."_".$_FILES['berkas']['name'];
			$e 				= explode('.', $berkas_buku);
			$ekst 			= strtolower(end($e));
			$file_size		= $_FILES['berkas']['size'];	
			
			if((in_array($ekstensi, $ekstensi_diperbolehkan) === true) && (in_array($ekst, $berkas_type) === true)){
				if($ukuran < 1044070){
					unlink($sampul);
					move_uploaded_file($_FILES['berkas']['tmp_name'], $folder.$berkas_buku);	
					move_uploaded_file($file_tmp, '../../../berkas/'.$nama);
					mysqli_query($koneksi, "UPDATE buku SET nama 	   = '$nam',
														 tahun_terbit  = '$tah',
														 id_penerbit   = '$pen',
														 id_penulis    = '$pel',
														 id_kategori   = '$kat',
														 sinopsis	   = '$sin',
    													 sampul 	   = '$nama',
    													 berkas        = '$berkas_buku'
    													 WHERE id 	   = '$_POST[id]'");
				}
				else{
					echo "<script>alert('Ukuran Gambar Terlalu Besar!'); onclick=self.history.back()</script>";
				}	   
			 }
			else{
				echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); onclick=self.history.back()</script>";
			}
			echo "$sampul";
			header('location:buku.php');
		}
?>