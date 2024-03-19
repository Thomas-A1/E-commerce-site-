<?php
// Start session
session_start();

// Destroy session data
session_destroy();

// Redirect to the login page
header("Location: ../ecom/login.php");
exit; // Stop further execution
?>
