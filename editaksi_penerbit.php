<?php 

if (isset($_POST['edit'])) {

include 'connect.php';

$id 	= $_POST['id'];
$nama 	= $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon= $_POST['telepon'];
$email 	= $_POST['email'];

$query = "UPDATE penerbit SET nama = '".$nama."', alamat = '".$alamat."', telepon = '".$telepon."', email = '".$email."' WHERE id = '".$id."' ";

  $result = mysqli_query($koneksi, $query);
  
  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
  }
  header("location:penerbit.php");
}

echo "Gagal UPDATE";

 
?>