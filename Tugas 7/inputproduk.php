<?php
include "koneksi.php";

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    
    $sql = "INSERT INTO products (produk, harga, deskripsi, stok) VALUES ('$produk', '$harga', '$deskripsi', '$stok')";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Produk berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
$koneksi->close();
?>