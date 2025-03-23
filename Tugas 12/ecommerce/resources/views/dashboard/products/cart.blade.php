<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cart-table th, .cart-table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="text-center">Shopping Cart</h2>
        <table class="table table-bordered cart-table">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="https://via.placeholder.com/50" class="cart-img" alt="Product"></td>
                    <td>Product Name</td>
                    <td>Rp100.000</td>
                    <td><input type="number" class="form-control" value="1" min="1"></td>
                    <td>Rp100.000</td>
                    <td><button class="btn btn-danger">Remove</button></td>
                </tr>
                <tr>
                    <td><img src="https://via.placeholder.com/50" class="cart-img" alt="Product"></td>
                    <td>Product Name</td>
                    <td>Rp150.000</td>
                    <td><input type="number" class="form-control" value="1" min="1"></td>
                    <td>Rp150.000</td>
                    <td><button class="btn btn-danger">Remove</button></td>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <h4>Total: <span class="fw-bold">Rp250.000</span></h4>
            <button class="btn btn-success">Checkout</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

