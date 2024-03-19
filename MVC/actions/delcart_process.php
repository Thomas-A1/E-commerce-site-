<?php
// Include the necessary cart_class file
require_once("../classes/cart_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product ID and customer ID from the form
    $product_id = isset($_POST["p_id"]) ? $_POST["p_id"] : '';
    $customer_id = isset($_POST["c_id"]) ? $_POST["c_id"] : '';

    // Validate product ID and customer ID
    if (!empty($product_id) && !empty($customer_id)) {
        // Create an instance of the CartClass
        $cartClass = new CartClass();

        // Call the remove_from_cart function to delete the cart item
        $result = $cartClass->remove_from_cart($product_id, $customer_id);

        if ($result) {
            echo "Cart item deleted successfully!";
            // Redirect back to the cart page or any other page as needed
            header("Location: ../ecom/cart.php");
            exit;
        } else {
            echo "Error: Failed to delete cart item.";
        }
    } else {
        echo "Invalid product ID or customer ID.";
    }
} else {
    echo "Invalid request method.";
}
?>
