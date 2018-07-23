<?php
  include "config/connect.php";
  $user   = $_POST['username'];
  $pass   = $_POST['password'];
  $login  = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
  $ketemu = mysqli_num_rows($login);
  $r      = mysqli_fetch_array($login);
  $iusr   = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id='$r[id]'");
  //buat mendefault foto jika tidak ada foto profil
 
  if ($ketemu > 0){
    session_start();
    
    $_SESSION['username'] = $r['username']; //buat login masuk
    $_SESSION['password'] = $r['password']; //buat password login masuk
    $_SESSION['login']    = 1;              //buat cek apakah ada data guru, user/siswa/i dan hanya bisa satu saja yang masuk
    header('location:'.$r['status']);       //buat menentukan mana admin, guru dan user/siswa/i
  }
  else{
    header("location:index.php?pesan=gagal");
  }
?>
