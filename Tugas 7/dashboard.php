<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
    exit();
}

echo "Selamat datang, Admin " . $_SESSION['username'] . "!";
echo '<br><a href="logout_admin.php">Logout</a>';
?>