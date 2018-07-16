<?php
include 'connect.php';
// Baca lokasi file sementar dan nama file dari form (fupload)
$nama 			= $_POST['nama'];
$tahun_terbit 	= $_POST['tahun_terbit'];
$sinopsis 		= $_POST['sinopsis'];
$penerbit 		= $_POST['penerbit'];
$penulis 		= $_POST['penulis'];
$kategori 		= $_POST['kategori'];
//berkas
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
//sampul
$fileinfo = PATHINFO($_FILES["sampul"]["name"]);
$newFilename = $fileinfo['filename']. "_". time(). "." .$fileinfo['extension'];
move_uploaded_file($_FILES, ["sampul"]["tmp_name"], "img/". $newFilename);
// Tentukan folder untuk menyimpan file
$folder		= "berkas/$nama_file";
$location 	= "img/". $newFilename;
// Apabila file berhasil di upload

echo $nama;
echo $tahun_terbit;
echo $sinopsis;
echo $penerbit;
echo $penulis;
echo $kategori;

exit();

if (move_uploaded_file($lokasi_file,"$folder")){
	mysqli_query($koneksi, "INSERT INTO buku (nama, tahun_terbit, id_penulis, id_penerbit, id_kategori, sinopsis, sampul, berkas)
							 VALUES('$nama', '$tahun_terbit', '$penulis', '$penerbit', '$kategori', '$sinopsis','$location','$folder')");
  // header("location:buku.php");
	print"<script>alert(\"berhasil menambah buku\"); location.href = \"buku.php\"; </script>";
}
else{
  echo "File gagal di upload";
}
?>