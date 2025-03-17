<?php
session_start();
include '../config/db.php';

// Pastikan keranjang tidak kosong
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: buyer_dashboard.php");
    exit();
}

// Jika checkout dikonfirmasi
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['checkout'])) {
    $_SESSION['order'] = [
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'payment_method' => $_POST['payment_method'],
        'cart' => $_SESSION['cart'],
        'total_price' => $_POST['total_price'],
    ];

    // Redirect ke halaman sukses
    header("Location: checkout_success.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Checkout</h2>
    <a href="cart.php" class="btn btn-secondary mb-3">← Kembali ke Keranjang</a>

    <form method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Alamat Pengiriman</label>
        <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label for="payment_method" class="form-label">Metode Pembayaran</label>
        <select name="payment_method" id="payment_method" class="form-select" required>
          <option value="transfer">Transfer Bank</option>
          <option value="cod">Bayar di Tempat (COD)</option>
          <option value="ewallet">E-Wallet</option>
        </select>
      </div>

      <h4>Ringkasan Pesanan</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total_price = 0;
          foreach ($_SESSION['cart'] as $product) {
              $subtotal = $product['price'] * $product['quantity'];
              $total_price += $subtotal;
              echo "<tr>
                      <td>{$product['name']}</td>
                      <td>{$product['quantity']}</td>
                      <td>Rp " . number_format($product['price'], 0, ',', '.') . "</td>
                      <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
                    </tr>";
          }
          ?>
          <tr>
            <td colspan="3" class="text-end"><strong>Total:</strong></td>
            <td><strong>Rp <?= number_format($total_price, 0, ',', '.'); ?></strong></td>
          </tr>
        </tbody>
      </table>

      <input type="hidden" name="total_price" value="<?= $total_price; ?>">

      <button type="submit" name="checkout" class="btn btn-success mb-3">Konfirmasi Checkout</button>
    </form>
  </div>
</body>

</html>