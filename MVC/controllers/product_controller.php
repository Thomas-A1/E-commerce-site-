<?php
//connect to the user account class
include("C:/xampp/htdocs/MVC/MVC/classes/product_class.php");

// }
function add_product_ctr($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords) {
    $productClass = new product_class();
    return $productClass->add_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);
}

function update_product_ctr($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords) {
    // Create an instance of the product_class
    $productClass = new product_class();

    // Call the update_product method to update the product
    $result = $productClass->update_product($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

    // Return the result of the update operation
    return $result;
}


function display_products_ctr() {
    $productClass = new product_class();
    $products = $productClass->get_all_products();
    return $products;
}

function delete_product_ctr($product_id) {
    $productClass = new product_class();
    return $productClass->delete_product($product_id);
}

// Function to search products by keyword
// Function to search products by keyword
function search_products_ctr($keyword) {
    $productClass = new product_class();
    return $productClass->search_products($keyword);
}



?>