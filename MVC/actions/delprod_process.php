<?php
// Include the necessary class file
require("../classes/product_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product ID from the form
    $product_id = isset($_POST["product_id"]) ? $_POST["product_id"] : '';

    // Validate product ID
    if (!empty($product_id)) {
        // Create an instance of the product_class
        $productClass = new product_class();

        // Call the delete_product function to delete the product
        $result = $productClass->delete_product($product_id);

        if ($result) {
            echo "Product deleted successfully!";
            // Redirect back to the admin page
            header("Location: ../admin.php");
            exit;
        } else {
            echo "Error: Failed to delete product.";
        }
    } else {
        echo "Invalid product ID.";
    }
} else {
    echo "Invalid request method.";
}
?>
