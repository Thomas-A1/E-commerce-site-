<?php
// Connect to the category class
include("../classes/category_class.php");

//--INSERT--//

function add_category_ctr($cat_name) {
    $categoryClass = new category_class();
    return $categoryClass->add_category($cat_name);
}

//--SELECT--//

function display_category_ctr() {
    $categoryClass = new category_class();
    $categories = $categoryClass->get_all_categories();
    return $categories;
}

//--UPDATE--//

function update_category_ctr($cat_id, $cat_name) {
    $categoryClass = new category_class();
    return $categoryClass->update_category($cat_id, $cat_name);
}

//--DELETE--//

function delete_category_ctr($cat_id) {
    $categoryClass = new category_class();
    return $categoryClass->delete_category($cat_id);
}
?>
