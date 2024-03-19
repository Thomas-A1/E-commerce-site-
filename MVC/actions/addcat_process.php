<?php
// Include the necessary class file
require("../classes/category_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cat_name = $_POST["cat_name"];

    // Validate and process the data
    if (!empty($cat_name)) {
        // Create an instance of the category_class
        $categoryClass = new category_class();

        // Call the add_category function to insert category data into the database
        $result = $categoryClass->add_category($cat_name);

        if ($result) {
            echo "Category added successfully!";
            header("Location: ../admin2.php");
            exit; 
        } else {
            echo "Error: Failed to add category.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
