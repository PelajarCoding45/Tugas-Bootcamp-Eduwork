<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #273036;">
  <!-- Bagian Navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">INPUT BARANG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">INPUT BARANG</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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

  <div class="container mt-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center fw-bold">
            INPUT DATA PRODUK
          </div>
          <div class="card-body">
            <!-- Bagian Form -->
            <form action="inputproduk.php" method="POST">
              <div class="mb-3">
                <label for="produk" class="form-label">Produk</label>
                <input type="text" class="form-control" id="produk" name="produk" required>
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="harga" class="form-control" id="harga" name="harga" required>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
              </div>
              <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" required>
              </div>
              <button type="submit" class="btn btn-primary" name="proses">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bagian JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>