<?php
//start session
// session_start(); 

//for header redirection
ob_start();

//funtion to check for login

function check_login(){
    if (empty($_SESSION['customer_email'])) {
        // User is not logged in, redirect to login page
        header("../login.php");
        exit; // Add exit to stop further execution
    } else {
        // User is logged in, continue
    }
}

//function to get user ID
// $customer_email = $_SESSION['customer_email'];

//function to check for role (admin, customer, etc)



?>