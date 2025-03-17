<?php
// Filter Kategori
include '../config/db.php';
$filter_category = isset($_GET['category']) ? $_GET['category'] : '';
$sql = "SELECT * FROM products";
if ($filter_category != '') {
    $sql .= " WHERE category = '$filter_category'";
}
$result = $conn->query($sql);
?>

<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Management Product</title>
  <!-- Bagian FavIcon -->
  <link rel="icon" href="../assets/logofx.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:darkorange;">
  <div class="container mt-5">
    <img src="../assets/logofx.png" alt="logo" style="height:50px; width:50px; display:flex;" class="float-start me-2">
    <h2 class="mb-4">Management Product</h2>
    <a href="../pages/add_produk.php" class="btn btn-success mb-5">+ Add Product</a>
    <a href="../auth/logout.php" class="btn btn-danger mb-5">Logout</a>

    <!-- Filter Kategori -->
    <?php
      include '../config/db.php';


// Tangkap filter kategori dari form GET
$filter_category = isset($_GET['category']) ? $_GET['category'] : '';

?>

    <form method="GET" class="mb-3">
      <div class="row">
        <div class="col-md-4">
          <select name="category" class="form-select" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            <?php
                $category_query = "SELECT DISTINCT category FROM products";
                $category_result = $conn->query($category_query);
                while ($cat = $category_result->fetch_assoc()) {
                    $selected = ($filter_category == $cat['category']) ? 'selected' : '';
                    echo "<option value='" . $cat['category'] . "' $selected>" . $cat['category'] . "</option>";
                }
                ?>
          </select>
        </div>
      </div>
    </form>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Query untuk menampilkan produk berdasarkan filter kategori
        $sql = "SELECT * FROM products";
        if (!empty($filter_category)) {
            $sql .= " WHERE category = ?";
        }
        $stmt = $conn->prepare($sql);

        if (!empty($filter_category)) {
            $stmt->bind_param("s", $filter_category);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['id_produk'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['stock'] . "</td>
                    <td><img src='" . $row['image'] . "' width='50'></td>
                    <td>" . $row['category'] . "</td>
                    <td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>
                    <td>
                                <a href='edit_produk.php?id=" . $row['id_produk'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_produk.php?id=" . $row['id_produk'] . "' class='btn btn-danger btn-sm' onclick=return confirm(`Apakah Anda yakin?`)>Delete</a>
                            </td>
        </tr>" ; } } else { echo "<tr>
          <td colspan='7' class='text-center'>Tidak ada produk</td>
        </tr>" ; } ?>
        </tbody>
      </table>
    </div>
    <tbody>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>