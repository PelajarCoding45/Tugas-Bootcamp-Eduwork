<?php
session_start();
if ($_SESSION == NULL) {
  header('location:login.php');
}else {
  include "koneksi.php";
}
?>

<html>

<head>
  <title>Stok Barang</title>
  <!-- Bagian Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bagian FavIcon -->
  <link rel="icon" href="img/logofx.png" type="image/png">
  <!-- Bagian CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Bagian Navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="index.php">STOCK BARANG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">STOCK BARANG</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="produk.php">Input Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logout.php">Logout</a>
            </li>
            <form class="d-flex mt-3" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir Bagian -->

  <!-- Bagian Table Produk -->
  <table class="table table-dark table-striped mt-5 mb-0">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Stok</th>
        <th colspan="2" style="text-align:center;">Aksi</th>
      </tr>
    </thead>
    <?php
      include 'koneksi.php';
      $ambildata = mysqli_query($koneksi, "SELECT * FROM products");
      while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$tampil[id]</td>
            <td>$tampil[produk]</td>
            <td>$tampil[harga]</td>
            <td>$tampil[deskripsi]</td>
            <td>$tampil[stok]</td>
            <td><a href='?id'$tampil[produk]'>Hapus</a></td>
            <td><a href='?id'$tampil[id]'>Ubah</a></td>
        </tr>";
      }
    ?>
  </table>
  <!-- Akhir Bagian -->

  <!-- Bagian JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>