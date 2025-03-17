<?php
session_start();

// Pastikan ada order yang diproses
if (!isset($_SESSION['order'])) {
    header("Location: buyer_dashboard.php");
    exit();
}

// Simpan order ke database jika diperlukan
// Nanti bisa tambahkan proses simpan ke tabel `orders`

// Hapus keranjang setelah checkout
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5 text-center">
    <h2 class="mb-4 text-success">✅ Checkout Berhasil!</h2>
    <p>Terima kasih, <strong><?= $_SESSION['order']['name']; ?></strong>, pesanan Anda telah diterima.</p>
    <p><strong>Alamat Pengiriman:</strong> <?= $_SESSION['order']['address']; ?></p>
    <p><strong>Metode Pembayaran:</strong> <?= ucfirst($_SESSION['order']['payment_method']); ?></p>
    <p><strong>Total Pembayaran:</strong> Rp <?= number_format($_SESSION['order']['total_price'], 0, ',', '.'); ?></p>

    <a href="buyer_dashboard.php" class="btn btn-primary">Kembali ke Halaman Produk</a>
  </div>
</body>

</html>