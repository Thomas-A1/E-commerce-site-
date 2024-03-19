<?php
// Start the session
session_start();

// Include your controller file
include("../controllers/user_controller.php");
include "../settings/core.php";

// Retrieve form inputs (replace these with your form processing logic)
$customer_email = $_POST['customer_email'];
$password_hash = $_POST['password_hash'];

// Call login_user_ctr function
if (login_user_ctr($customer_email, $password_hash)) {
    // Set session variable to indicate user is logged in
    $_SESSION['customer_email'] = $customer_email;
    
    // Check user role
    $userClass = new user_class();
    $user = $userClass->get_user_by_email($customer_email); 
    
    // Assuming there's a method to retrieve user details by email
    
    if ($user['user_role'] == 1) {
        // User is an admin, redirect to admin page
        echo 'success';
    } elseif ($user['user_role'] == 2) {
        // User is a regular user, redirect to appropriate page for regular users
        echo 'success1';
    } else {
        // Invalid user role, handle appropriately (e.g., show error message)
        echo 'error';
    }
} else {
    // Redirect back to the login page with a login error parameter
    echo 'error';
}
?>
