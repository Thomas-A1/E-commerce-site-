<?php
// Include the necessary class file
require_once("../classes/cart_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST["p_id"];
    $customer_id = $_POST["c_id"];
    $quantity = $_POST["qty"];

    // Validate and process the data
    if (!empty($product_id) && !empty($customer_id) && !empty($quantity)) {
        // Include the cart class
        // require("../classes/cart_class.php");

        // Create an instance of the CartClass
        $cartClass = new CartClass();

        // Call the update_cart_item_quantity function to update item quantity in the cart
        $result = $cartClass->update_cart_item_quantity($product_id, $customer_id, $quantity);

        if ($result) {
            echo "Cart item quantity updated successfully!";
            header("Location: ../ecom/cart.php"); // Redirect to the cart page after successful update
            exit; 
        } else {
            echo "Error: Failed to update cart item quantity.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
