<?php
include '../config/db.php';
// Periksa apakah ada ID produk yang dikirim
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Ambil data produk untuk mendapatkan nama file gambar
    $sql_select = "SELECT image FROM products WHERE id_produk = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("i", $id_produk);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_path = $row['image']; // Path gambar

        // Hapus produk dari database
        $sql_delete = "DELETE FROM products WHERE id_produk = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id_produk);

        if ($stmt_delete->execute()) {
            // Hapus gambar jika ada
            if (file_exists($image_path) && !empty($image_path)) {
                unlink($image_path);
            }

            // Redirect ke dashboard admin setelah sukses
            header("Location: admin_dashboard.php?status=deleted");
            exit();
        } else {
            echo "Gagal menghapus produk!";
        }
    } else {
        echo "Produk tidak ditemukan!";
    }
} else {
    echo "ID Produk tidak valid!";
}
?>