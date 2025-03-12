<?php
    if(isset($_GET['produk'])){
      mysqli_query($koneksi, "DELETE FROM products WHERE produk='$_GET[produk]'");

      echo "Data berhasil dihapus";
      echo "<meta http-equiv=refresh content=2;URL=barang-data.php'>";
    }
?>