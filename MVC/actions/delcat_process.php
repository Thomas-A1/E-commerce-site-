<?php
// Include the necessary class file
require("../classes/category_class.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve category ID from the form
    $cat_id = isset($_POST["cat_id"]) ? $_POST["cat_id"] : '';

    // Validate category ID
    if (!empty($cat_id)) {
        // Create an instance of the category_class
        $categoryClass = new category_class();

        // Call the delete_category function to delete the category
        $result = $categoryClass->delete_category($cat_id);

        if ($result) {
            echo "Category deleted successfully!";
            // Redirect back to the admin page
            header("Location: ../admin2.php");
            exit;
        } else {
            echo "Error: Failed to delete category.";
        }
    } else {
        echo "Invalid category ID.";
    }
} else {
    echo "Invalid request method.";
}
?>
