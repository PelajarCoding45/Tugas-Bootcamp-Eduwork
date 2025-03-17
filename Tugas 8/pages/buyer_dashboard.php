<?php
session_start();
include '../config/db.php';

// Tangkap filter kategori dari form GET
$filter_category = isset($_GET['category']) ? $_GET['category'] : '';

// Ambil daftar produk berdasarkan kategori (jika dipilih)
$sql = "SELECT * FROM products";
if ($filter_category != '') {
    $sql .= " WHERE category = '$filter_category'";
}
$result = $conn->query($sql);

// Tambahkan produk ke keranjang (jika ada request POST)
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $product_query = $conn->prepare("SELECT id_produk, name, price, stock, image FROM products WHERE id_produk = ?");
    $product_query->bind_param("i", $product_id);
    $product_query->execute();
    $product_result = $product_query->get_result();

    if ($product_result->num_rows > 0) {
        $product = $product_result->fetch_assoc();
        if ($product['stock'] > 0) {
            // Inisialisasi session cart jika belum ada
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            // Tambahkan produk ke keranjang
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += 1;
            } else {
                $_SESSION['cart'][$product_id] = [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'quantity' => 1
                ];
            }
            header("Location: buyer_dashboard.php?success=Produk berhasil ditambahkan ke keranjang!");
            exit();
        } else {
            header("Location: buyer_dashboard.php?error=Stok produk tidak mencukupi!");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BelanjaDulu</title>
  <link rel="icon" href="../assets/logofx.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
  .floating-cart {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: white;
    color: white;
    padding: 15px;
    border-radius: 50%;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    text-decoration: none;
  }

  .floating-cart:hover {
    background-color: whitesmoke;
  }

  .floating-cart svg {
    width: 30px;
    height: 30px;
    fill: white;
  }
  </style>
</head>

<body style="background-color:darkorange;">
  <div class="container mt-5">
    <img src="../assets/logofx.png" alt="logo" style="height:50px; width:50px; display:flex;" class="float-start me-2">
    <h2 class="mb-4" style="color:white;">BelanjaDulu</h2>
    <a href="../auth/logout.php" class="btn btn-danger mb-5">Logout</a>

    <!-- Tampilkan Pesan Sukses atau Error -->
    <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($_GET['success']); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo htmlspecialchars($_GET['error']); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Filter Kategori -->
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

    <div class="row">
      <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>"
            style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <p class="card-text"><?php echo $row['description']; ?></p>
            <p class="card-text"><strong>Harga: </strong> Rp <?php echo number_format($row['price'], 0, ',', '.'); ?>
            </p>
            <p class="card-text"><strong>Stok: </strong><?php echo $row['stock']; ?></p>
            <p class="card-text"><span class="badge bg-primary"><?php echo $row['category']; ?></span></p>
            <form method="POST">
              <input type="hidden" name="product_id" value="<?php echo $row['id_produk']; ?>">
              <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
      <?php
            }
        } else {
            echo '<p class="text-center">Tidak ada produk tersedia.</p>';
        }
        ?>
    </div>
  </div>

  <!-- Bagian Cart Button -->
  <a href="cart.php" class="floating-cart">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.827 6.827">
      <rect width="6.827" height="6.827" rx=".853" ry=".853" style="fill:#66bb6a" />
      <g>
        <path
          d="M1.608 2.024h4.333l-.048.14L5.32 3.85l-.024.073H1.978l-.021-.08-.452-1.685-.036-.134h.14zm.684 1.283h2.673l-.074.213H2.35l-.058-.213zm-.115-.425h2.935l-.074.213H2.234l-.057-.213zm-.116-.429h3.198v.006l-.072.208H2.118l-.057-.214z"
          style="fill:#fffffe" />
        <path class="fil2" d="M.886 1.514H1.553l.021.079.687 2.562h2.956l-.072.213H2.097l-.021-.08-.686-2.561H.886z"
          style="fill:#fffffe" />
        <path class="fil2"
          d="M2.423 4.514a.398.398 0 0 1 .282.682.398.398 0 0 1-.682-.282.398.398 0 0 1 .4-.4zm.131.268a.185.185 0 0 0-.317.132.185.185 0 0 0 .317.131.185.185 0 0 0 0-.263z"
          style="fill:#fffffe" />
        <path class="fil2"
          d="M5.02 4.514a.398.398 0 0 1 .282.682.398.398 0 0 1-.682-.282.398.398 0 0 1 .4-.4zm.131.268a.185.185 0 0 0-.318.132.186.186 0 0 0 .318.131.185.185 0 0 0 0-.263z"
          style="fill:#fffffe" />
      </g>
    </svg>
  </a>
  <!-- Akhir Bagian -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>