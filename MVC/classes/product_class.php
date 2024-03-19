<?php
//connect to database class
require_once("C:/xampp/htdocs/MVC/MVC/settings/db_class.php");

/**
 * General class to handle all functions 
 *
 * @author David Sampah
 */
class product_class extends db_connection
{
    //--INSERT--//
    public function add_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)
    {
        $ndb = new db_connection();
        $product_cat = (int) $product_cat; // Convert to integer
        $product_brand = mysqli_real_escape_string($ndb->db_conn(), $product_brand);
        $product_title = mysqli_real_escape_string($ndb->db_conn(), $product_title);
        $product_price = (float) $product_price; // Convert to float
        $product_desc = mysqli_real_escape_string($ndb->db_conn(), $product_desc);
        $product_image = mysqli_real_escape_string($ndb->db_conn(), $product_image);
        $product_keywords = mysqli_real_escape_string($ndb->db_conn(), $product_keywords);
    
        $sql = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) 
                VALUES ('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";
        return $this->db_query($sql);
    }
    
    //--UPDATE--//
    public function update_product($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)
    {
        $ndb = new db_connection();
        $product_id = (int) $product_id; // Convert to integer
        $product_cat = (int) $product_cat; // Convert to integer
        $product_brand = mysqli_real_escape_string($ndb->db_conn(), $product_brand);
        $product_title = mysqli_real_escape_string($ndb->db_conn(), $product_title);
        $product_price = (float) $product_price; // Convert to float
        $product_desc = mysqli_real_escape_string($ndb->db_conn(), $product_desc);
        $product_image = mysqli_real_escape_string($ndb->db_conn(), $product_image);
        $product_keywords = mysqli_real_escape_string($ndb->db_conn(), $product_keywords);
    
        $sql = "UPDATE `products` SET 
                    `product_cat` = '$product_cat', 
                    `product_brand` = '$product_brand', 
                    `product_title` = '$product_title', 
                    `product_price` = '$product_price', 
                    `product_desc` = '$product_desc', 
                    `product_image` = '$product_image', 
                    `product_keywords` = '$product_keywords' 
                WHERE `product_id` = '$product_id'";
    
        return $this->db_query($sql);
    }

    //--SELECT--//
    public function get_all_products()
    {
        $ndb = new db_connection();
    
        // Use prepared statement to prevent SQL injection
        $stmt = $ndb->db_conn()->prepare("SELECT * FROM products");
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            // Query failed
            // Handle the error, log it, or return an appropriate response
            return false;
        }
    
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $products = array();
            // Fetch each product row
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products; // Return an array of products
        } else {
            return false; // No products found
        }
    }
    
    public function delete_product($product_id)
    {
        $ndb = new db_connection();
        $product_id = (int) $product_id; // Convert to integer
    
        // Prepare the SQL statement
        $stmt = $ndb->db_conn()->prepare("DELETE FROM `products` WHERE `product_id` = ?");
        
        // Bind parameters
        $stmt->bind_param("i", $product_id);
        
        // Execute the statement
        $result = $stmt->execute();
    
        // Close the statement
        $stmt->close();
    
        return $result;
    }

        // Function to search products by keyword
        public function search_products($keyword)
        {
            $ndb = new db_connection();
    
            // Use prepared statement to prevent SQL injection
            $stmt = $ndb->db_conn()->prepare("SELECT * FROM products WHERE product_title LIKE ? OR product_desc LIKE ?");
            
            // Bind parameters
            $searchTerm = "%{$keyword}%";
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
    
            // Execute the statement
            $stmt->execute();
    
            // Get the result
            $result = $stmt->get_result();
    
            // Check if any rows were returned
            if ($result->num_rows > 0) {
                $products = array();
                // Fetch each product row
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
                return $products; // Return an array of products
            } else {
                return false; // No products found
            }
        }
    // public function get_all_products(){
    //     $sql = "SELECT * FROM `products`";
    //     return $this->db_query($sql);
    // }    
    
}
?>
