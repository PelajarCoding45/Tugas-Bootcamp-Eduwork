<?php
    $db_name = "ecommerce";
    $username = "root";
    $password = "";
    $server = "localhost";

    $koneksi = mysqli_connect ($server, $username, $password, $db_name);

    if ($koneksi->connect_error) {
      die('Database Tidak Terhubung, Error : ' .$conn->connect_error);
    }
?>