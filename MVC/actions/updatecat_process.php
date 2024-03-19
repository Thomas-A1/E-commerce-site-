<?php
// Include the necessary class file
require("../classes/category_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cat_id = $_POST["cat_id"];
    $cat_name = $_POST["cat_name"];

    // Validate and process the data
    if (!empty($cat_id) && !empty($cat_name)) {
        // Create an instance of the category_class
        $categoryClass = new category_class();

        // Call the update_category function to update category data in the database
        $result = $categoryClass->update_category($cat_id, $cat_name);

        if ($result) {
            echo "Category updated successfully!";
            header("Location: ../admin2.php");
            exit; 
        } else {
            echo "Error: Failed to update category.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
