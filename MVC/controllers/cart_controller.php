<?php
// Connect to the cart class
include("C:/xampp/htdocs/MVC/MVC/classes/cart_class.php");

// Function to add item to cart
function add_to_cart_ctr($product_id, $customer_id, $ip_address, $quantity) {
    $cartClass = new CartClass();
    return $cartClass->add_to_cart($product_id, $customer_id, $ip_address, $quantity);
}

// Function to get cart items
function get_cart_items_ctr($customer_id) {
    $cartClass = new CartClass();
    return $cartClass->get_cart_items($customer_id);
}

// Function to remove item from cart
function remove_from_cart_ctr($product_id, $customer_id) {
    $cartClass = new CartClass();
    return $cartClass->remove_from_cart($product_id, $customer_id);
}

// Function to update cart item quantity
function update_cart_item_quantity_ctr($product_id, $customer_id, $quantity) {
    $cartClass = new CartClass();
    return $cartClass->update_cart_item_quantity($product_id, $customer_id, $quantity);
}

function display_cart_ctr($customer_id) {
    $cartClass = new CartClass();
    return $cartClass->get_cart_items($customer_id);
}
?>
