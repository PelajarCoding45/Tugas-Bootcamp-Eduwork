<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); // Gantilah dengan password_hash() untuk keamanan lebih baik

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: ../pages/admin_dashboard.php");
        } else {
            header("Location: ../pages/buyer_dashboard.php");
        }
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='../index.php';</script>";
    }
}
?>