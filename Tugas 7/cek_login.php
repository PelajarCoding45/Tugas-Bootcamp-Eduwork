<?php
  include 'koneksi.php';

  $user = $_POST['username'];
  $pass = $_POST['password'];
  $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$user' && password = '$pass'");

  $cari = mysqli_num_rows($sql);
  $akses = mysqli_fetch_array($sql);
  if($cari) {
    session_start();
    $_SESSION['ceklog'] = $akses['username'];
    echo"<script>alert('Login Sukses');document.location.href='index.php';</script>";
  }else{
    echo"<script>alert('Login Gagal');document.location.href='login.php';</script>";
  }
?>