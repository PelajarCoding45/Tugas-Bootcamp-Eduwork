<?php
// Sertakan koneksi database
include '../config/db.php';
// Periksa apakah ada ID produk di URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    
    // Ambil data produk berdasarkan ID
    $sql = "SELECT * FROM products WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Jika produk ditemukan, simpan dalam variabel
    if ($result->num_rows > 0) {
        $produk = $result->fetch_assoc();
    } else {
        echo "Produk tidak ditemukan!";
        exit;
    }
} else {
    echo "ID Produk tidak valid!";
    exit;
}

// Proses update produk setelah form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['name'];
    $deskripsi = $_POST['description'];
    $stok = $_POST['stock'];
    $kategori = $_POST['category'];
    $harga = $_POST['price'];
    $gambar_lama = $produk['image']; // Simpan gambar lama jika tidak diganti

    // Cek apakah ada file yang diupload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        if (!in_array($image_ext, $allowed_extensions)) {
            die("Error: Hanya file JPG dan PNG yang diperbolehkan.");
        }

        // Buat nama file random
        $new_image_name = uniqid() . '.' . $image_ext;
        $target_file = "uploads/" . $new_image_name;

        // Hapus gambar lama jika ada
        if (file_exists($gambar_lama)) {
            unlink($gambar_lama);
        }

        // Cek apakah folder uploads/ ada, jika tidak buat foldernya
          if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
          }

        // Pindahkan file ke folder uploads
        if (move_uploaded_file($image_tmp, $target_file)) {
            $gambar_lama = $target_file; // Gunakan gambar baru
        } else {
            echo "Error: Gagal mengupload gambar.";
            exit;
        }
    }

    // Update produk di database
    $sql_update = "UPDATE products SET name=?, description=?, stock=?, image=?, category=?, price=? WHERE id_produk=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssissdi", $nama, $deskripsi, $stok, $gambar_lama, $kategori, $harga, $id_produk);

    if ($stmt_update->execute()) {
        echo "Produk berhasil diperbarui!";
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Gagal memperbarui produk!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Produk</title>
  <!-- Bagian FavIcon -->
  <link rel="icon" href="../assets/logofx.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2>Edit Produk</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name" class="form-control" value="<?= $produk['name'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" required><?= $produk['description'] ?></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" value="<?= $produk['stock'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category" class="form-control" required>
          <option value="Fashion" <?= ($produk['category'] == "Fashion") ? "selected" : "" ?>>Fashion</option>
          <option value="Electronic" <?= ($produk['category'] == "Electronic") ? "selected" : "" ?>>Electronic</option>
          <option value="Furniture" <?= ($produk['category'] == "Furniture") ? "selected" : "" ?>>Furniture</option>
          <option value="Accessories" <?= ($produk['category'] == "Accessories") ? "selected" : "" ?>>Accessories
          </option>
          <option value="Food" <?= ($produk['category'] == "Food") ? "selected" : "" ?>>Food</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price" class="form-control" value="<?= $produk['price'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Gambar Produk</label><br>
        <img src="<?= $produk['image'] ?>" width="100"><br>
        <input type="file" name="image" class="form-control mt-2">
        <small>Hanya file JPG/PNG. Kosongkan jika tidak ingin mengganti gambar.</small>
      </div>
      <button type="submit" class="btn btn-primary">Update Produk</button>
      <a href="admin_dashboard.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>