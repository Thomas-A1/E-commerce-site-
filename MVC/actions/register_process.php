<?php
// Include the necessary class file
// Include the necessary class file
require("../classes/user_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_name = $_POST["customer_name"];
    // $lastname = $_POST["lastname"];
    $customer_email = $_POST["customer_email"];
    $customer_pass = $_POST["customer_pass"];
    $customer_country = $_POST["customer_country"];
    $customer_city = $_POST["customer_city"];
    $customer_contact = $_POST["customer_contact"];

    // Validate and process the data
    if (!empty($customer_email) && !empty($customer_pass)) {
        // Hash the password
        $hashedPassword = password_hash($customer_pass, PASSWORD_DEFAULT);

        // Check if email already exists in the database
        $userClass = new user_class();
        $existingUser = $userClass->get_user_by_email($customer_email);

        if ($existingUser) {
            // Email already exists, return error response
            $response = array('status' => 'error', 'message' => 'Email already exists');
            echo json_encode($response);
            exit();
        }

        // Image upload process
        $msg = "";
        if (isset($_FILES['customer_image'])) {
            $filename = $_FILES["customer_image"]["name"];
            $tempname = $_FILES["customer_image"]["tmp_name"];  
            $folder = "../images/".$filename;

            // Move the uploaded image to the "images" folder
            if (move_uploaded_file($tempname, $folder)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }
        }

        // Set user role and other default values
        $user_role = 2; // Assuming user role is fixed for registration
        $customer_image = $folder; // Set the image path

        // Call the add_register function to insert user data into the database
        $result = $userClass->add_register($user_role, $customer_email, $customer_pass, $customer_name, $customer_country, $customer_city, $customer_contact, $customer_image);

        if ($result) {
            // Registration successful, return success response
            $response = array('status' => 'success');
            echo json_encode($response);
            exit();
        } else {
            // Registration failed, return error response
            $response = array('status' => 'error', 'message' => 'Failed to register');
            echo json_encode($response);
            exit();
        }
    } else {
        // Missing username or password, return error response
        $response = array('status' => 'error', 'message' => 'Missing fields');
        echo json_encode($response);
        exit();
    }
} else {
    // Invalid request method
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    echo json_encode($response);
    exit();
}

?>
