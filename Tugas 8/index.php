<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        header("Location: pages/admin_dashboard.php");
    } else {
        header("Location: pages/buyer_dashboard.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BelanjaDulu</title>
  <!-- Bagian FavIcon -->
  <link rel="icon" href="assets/logofx.png" type="image/png">
  <!--Bagain Bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-color:darkorange;">
  <div class="card p-4" style="width: 350px;">
    <img src="assets/logofx.png" alt="logo" style="height:80px; width:80px;" class="d-block mx-auto">
    <h4 class="text-center">BelanjaDulu</h4>
    <p class="text-center">Silakan Login terlebih dahulu!</p>
    <form action="auth/login.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</body>

</html>