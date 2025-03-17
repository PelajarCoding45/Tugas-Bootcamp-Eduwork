<?php
session_start();
include '../config/db.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: buyer_dashboard.php?error=Anda harus login terlebih dahulu!");
    exit();
}

$user_id = $_SESSION['user_id'];

// Pastikan ada product_id di URL
if (!isset($_GET['product_id']) || empty($_GET['product_id'])) {
    header("Location: buyer_dashboard.php?error=Produk tidak ditemukan!");
    exit();
}

$product_id = intval($_GET['product_id']);
$quantity = 1; // Default jumlah pembelian 1

// Ambil data produk dari database
$product_query = $conn->prepare("SELECT id, name, price, stock, image FROM products WHERE id = ?");
$product_query->bind_param("i", $product_id);
$product_query->execute();
$product_result = $product_query->get_result();

if ($product_result->num_rows === 0) {
    header("Location: buyer_dashboard.php?error=Produk tidak ditemukan!");
    exit();
}

$product = $product_result->fetch_assoc();

// Periksa stok produk sebelum menambah ke keranjang
if ($product['stock'] < $quantity) {
    header("Location: buyer_dashboard.php?error=Stok tidak mencukupi!");
    exit();
}

// Inisialisasi keranjang belanja jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Periksa apakah produk sudah ada di keranjang
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]['quantity'] += $quantity;
} else {
    $_SESSION['cart'][$product_id] = [
        'name' => $product['name'],
        'price' => $product['price'],
        'image' => $product['image'],
        'quantity' => $quantity
    ];
}

// Tutup koneksi
$product_query->close();
$conn->close();

// Redirect ke halaman dashboard dengan pesan sukses
header("Location: buyer_dashboard.php?success=Produk berhasil ditambahkan ke keranjang!");
exit();
?>