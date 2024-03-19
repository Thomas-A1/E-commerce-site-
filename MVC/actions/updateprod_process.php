<?php
// Include the necessary class file
require("../classes/product_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST["product_id"];
    $product_cat = $_POST["product_cat"];
    $product_brand = $_POST["product_brand"];
    $product_title = $_POST["product_title"];
    $product_price = $_POST["product_price"];
    $product_desc = $_POST["product_desc"];

    // Validate and process the data
    if (!empty($product_id) && !empty($product_cat) && !empty($product_brand) && !empty($product_title) && !empty($product_price) && !empty($product_desc)) {
        // Image upload process
        $msg = "";
        if (isset($_FILES['product_image'])) {
            $filename = $_FILES["product_image"]["name"];
            $tempname = $_FILES["product_image"]["tmp_name"];  
            $folder = "../images/".$filename;

            // Move the uploaded image to the "images" folder
            if (move_uploaded_file($tempname, $folder)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }
        }

        // Set other default values
        $product_image = isset($folder) ? $folder : ''; // Set the image path if uploaded
        $product_keywords = $_POST["product_keywords"]; // Assuming product keywords are not provided in the form

        // Create an instance of the product_class
        $productClass = new product_class();

        // Call the update_product function to update product data in the database
        $result = $productClass->update_product($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

        if ($result) {
            echo "Product updated successfully!";
            header("Location: ../admin.php");
            exit; 
        } else {
            echo "Error: Failed to update product.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
