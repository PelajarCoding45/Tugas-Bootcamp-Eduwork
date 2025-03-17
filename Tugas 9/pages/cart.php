<?php
session_start();

// **Handle Update Jumlah Produk**
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $product_id => $quantity) {
        $quantity = max(1, intval($quantity)); // Minimal jumlah adalah 1
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        }
    }
    header("Location: cart.php");
    exit();
}

// **Handle Hapus Produk**
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Keranjang Belanja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Keranjang Belanja</h2>
    <a href="buyer_dashboard.php" class="btn btn-primary mb-3">← Kembali ke Produk</a>

    <?php if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])): ?>
    <p class="text-center">Keranjang belanja Anda kosong.</p>
    <?php else: ?>
    <form method="POST">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $total_price = 0;
            foreach ($_SESSION['cart'] as $product_id => $product):
              $subtotal = $product['price'] * $product['quantity'];
              $total_price += $subtotal;
            ?>
          <tr>
            <td><img src="<?= $product['image']; ?>" width="50" height="50"></td>
            <td><?= $product['name']; ?></td>
            <td>Rp <?= number_format($product['price'], 0, ',', '.'); ?></td>
            <td>
              <input type="number" name="quantities[<?= $product_id; ?>]" value="<?= $product['quantity']; ?>" min="1"
                class="form-control" style="width: 70px;">
            </td>
            <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
            <td>
              <a href="cart.php?remove=<?= $product_id; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="4" class="text-end"><strong>Total:</strong></td>
            <td colspan="2"><strong>Rp <?= number_format($total_price, 0, ',', '.'); ?></strong></td>
          </tr>
        </tbody>
      </table>
      <a href="checkout.php" class="btn btn-success">Checkout</a>
    </form>
    <?php endif; ?>
  </div>
</body>

</html>