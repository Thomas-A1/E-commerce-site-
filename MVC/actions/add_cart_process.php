<?php
// Include the necessary class files
require_once("../classes/cart_class.php");
require_once("../classes/user_class.php");

// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST["product_id"];
    // Set default quantity to 1 if not provided
    $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : 1;

    // Check if user is logged in
    if(isset($_SESSION['customer_email'])){
        // Retrieve customer email from session
        $customer_email = $_SESSION['customer_email'];

        // Create an instance of the user_class
        $userClass = new user_class();

        // Get user ID by email
        $customer_id = $userClass->get_user_id_by_email($customer_email);

        if ($customer_id) {
            // Set customer ID in session
            $_SESSION['customer_id'] = $customer_id;

            // Validate and process the data
            if (!empty($product_id)) {
                // Get client IP address
                $ip_address = getRealIpAddr();

                // Create an instance of the CartClass
                $cartClass = new CartClass();

                // Call the add_to_cart function to insert product into the cart
                $result = $cartClass->add_to_cart($product_id, $customer_id, $ip_address, $quantity);

                if ($result) {
                    echo "Product added to cart successfully!";
                    // Redirect to the cart page
                    header("Location: ../ecom/cart.php");
                    exit; 
                } else {
                    echo "Error: Failed to add product to cart. Might be inserting duplicate.";
                }
            } else {
                echo "Please provide all required information.";
            }
        } else {
            echo "Failed to fetch user ID.";
        }
    } else {
        echo "User not logged in.";
    }
} else {
    echo "Invalid request method.";
}

// Function to get client IP address
function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Direct IP access
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>
