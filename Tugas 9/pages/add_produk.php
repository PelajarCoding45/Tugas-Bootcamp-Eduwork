<?php
// koneksi.php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'ecommerce';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah Produk
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    
    // Upload gambar
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
          $image_tmp = $_FILES['image']['tmp_name'];
          $image_name = $_FILES['image']['name'];
          $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); // Ambil ekstensi file
          
          // Format yang diperbolehkan
          $allowed_extensions = ['jpg', 'jpeg', 'png'];
          $allowed_mimes = ['image/jpeg', 'image/png'];
  
          // Cek ekstensi
          if (!in_array($image_ext, $allowed_extensions)) {
              die("Error: Hanya file JPG dan PNG yang diperbolehkan.");
          }
  
          // Cek MIME type untuk keamanan ekstra
          $image_mime = mime_content_type($image_tmp);
          if (!in_array($image_mime, $allowed_mimes)) {
              die("Error: Format file tidak valid.");
          }
  
          // Buat nama file random (gunakan uniqid() + ekstensi)
          $new_image_name = uniqid() . '.' . $image_ext;
          $target_dir = "uploads/";
          $target_file = $target_dir . $new_image_name;
  
          // Pindahkan file ke folder uploads
          if (move_uploaded_file($image_tmp, $target_file)) {
              echo "File berhasil diupload dengan nama: " . $new_image_name;
          } else {
              echo "Error: Gagal mengupload file.";
          }
      } else {
          echo "Error: Tidak ada file yang diupload atau terjadi kesalahan.";
      }
  }        
        // Simpan produk ke database   
    $sql = "INSERT INTO products (name, description, stock, image, category, price) VALUES ('$name', '$description', '$stock', '$target_file', '$category', '$price')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Produk berhasil ditambahkan!');</script>";
        header("Location:admin_dashboard.php");
    } else {
        echo "<script>alert('Gagal menambahkan produk!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manajemen Produk</title>
  <!-- Bagian FavIcon -->
  <link rel="icon" href="../assets/logofx.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Tambah Produk</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" name="image" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category" class="form-select" required>
          <option value="">Pilih Kategori</option>
          <option value="Fashion">Fashion</option>
          <option value="Electronic">Electronic</option>
          <option value="Furniture">Furniture</option>
          <option value="Accessories">Accessories</option>
          <option value="Food">Food</option>
        </select>
        <div class="mb-3 mt-3">
          <label class="form-label">Harga</label>
          <input type="number" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Tambah Produk</button>
        <button class="btn btn-danger mb-5"><a href="admin_dashboard.php"
            style="text-decoration:none; color:white">Cancel</a></button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>