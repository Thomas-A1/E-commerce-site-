<?php
// Start session
session_start(); 

// Function to check for login
function check_login(){
    if (empty($_SESSION['customer_email'])) {
        // User is not logged in, redirect to login page
        header("Location: ../login.php");
        exit; // Add exit to stop further execution
    } else {
        // User is logged in, continue
    }
}

// Call check_login function to enforce authentication
check_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Internal CSS -->
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Brand</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add Product</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Task 1: Add Brand -->
        <h3>Add Brand</h3>
        <form action="../MVC/actions/brand_process.php" method="POST">
            <div class="form-group">
                <label for="brandName" >Brand Name</label>
                <input type="text" class="form-control" id="brand_name" name="brand_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Task 2: Edit Brand -->
        <h3>Edit Brand</h3>
        <form>
            <div class="form-group">
                <label for="editBrandName">Brand Name</label>
                <input type="text" class="form-control" id="editBrandName" name="editBrandName" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Task 3: Add Category -->
        <h3>Add Category</h3>
        <form>
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Task 4: Edit Category -->
        <h3>Edit Category</h3>
        <form>
            <div class="form-group">
                <label for="editCategoryName">Category Name</label>
                <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Task 5: Product Management (add & edit) -->
        <h3>Product Management</h3>
        <form>
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productCategory">Product Category</label>
                <select class="form-control" id="productCategory" name="productCategory" required>
                    <!-- Populate with categories -->
                </select>
            </div>
            <div class="form-group">
                <label for="productBrand">Product Brand</label>
                <select class="form-control" id="productBrand" name="productBrand" required>
                    <!-- Populate with brands -->
                </select>
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="number" class="form-control" id="productPrice" name="productPrice" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" class="form-control-file" id="productImage" name="productImage" required>
            </div>
            <div class="form-group">
                <label for="productKeywords">Product Keywords</label>
                <input type="text" class="form-control" id="productKeywords" name="productKeywords" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Internal JS -->
    <script>
        // Add your custom JavaScript here
    </script>
</body>
</html>
