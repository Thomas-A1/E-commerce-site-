<?php
// Connect to database class
require_once("C:/xampp/htdocs/MVC/MVC/settings/db_class.php");

/**
 * Class to handle cart functions 
 *
 * @author David Sampah
 */
class CartClass extends db_connection
{
    //--INSERT--//
// Inside the add_to_cart function in CartClass


// Function to check if the product already exists in the cart for the given customer
    // Database connection
    private $conn;

    // Constructor to initialize the database connection
    public function __construct()
    {
        // Create a new instance of the database connection class
        $this->conn = new db_connection();
    }

    //--INSERT--//
    public function add_to_cart($product_id, $customer_id, $ip_address, $quantity)
    {
        $product_id = (int) $product_id; // Convert to integer
        $customer_id = (int) $customer_id; // Convert to integer
        $ip_address = mysqli_real_escape_string($this->conn->db_conn(), $ip_address);
        $quantity = (int) $quantity; // Convert to integer

        // Check if the product already exists in the cart for the given customer
        $existing_item = $this->check_existing_item($product_id, $customer_id);

        if ($existing_item) {
            // If the product already exists, return false to indicate duplicate
            return false;
        } else {
            // If the product does not exist, add it to the cart
            $query = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) 
                      VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->db_conn()->prepare($query);
            $stmt->bind_param("isii", $product_id, $ip_address, $customer_id, $quantity);
            $result = $stmt->execute();
            $stmt->close();
            return $result; // Return the result of the insertion
        }
    }

    // Function to check if the product already exists in the cart for the given customer
    private function check_existing_item($product_id, $customer_id)
    {
        $query = "SELECT * FROM cart WHERE p_id = ? AND c_id = ?";
        $stmt = $this->conn->db_conn()->prepare($query);
        $stmt->bind_param("ii", $product_id, $customer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc(); // Return the existing item if found, otherwise return null
    }
    //--SELECT--//
// Add your select functions here if needed
public function get_cart_items($customer_id)
{
    $ndb = new db_connection();

    // Use prepared statement to prevent SQL injection
    $stmt = $ndb->db_conn()->prepare("SELECT cart.p_id, cart.ip_add, cart.c_id, cart.qty, products.product_title, products.product_price, products.product_desc, products.product_image, products.product_keywords
                                     FROM cart
                                     JOIN products ON cart.p_id = products.product_id
                                     WHERE cart.c_id = ?");
    $stmt->bind_param("i", $customer_id); // Assuming customer_id is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        // Query failed
        // Handle the error, log it, or return an appropriate response
        return false;
    }

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        $cart_items = array();
        // Fetch each cart item along with product details
        while ($row = $result->fetch_assoc()) {
            $cart_items[] = $row;
        }
        return $cart_items; // Return an array of cart items with product details
    } else {
        return false; // No items found in the cart
    }
}

public function remove_from_cart($product_id, $customer_id)
{
    // Convert parameters to integers
    $product_id = (int) $product_id;
    $customer_id = (int) $customer_id;

    // Prepare the DELETE query
    $query = "DELETE FROM cart WHERE p_id = ? AND c_id = ?";
    $stmt = $this->conn->db_conn()->prepare($query);

    // Bind parameters and execute the query
    $stmt->bind_param("ii", $product_id, $customer_id);
    $result = $stmt->execute();

    // Close the statement
    $stmt->close();

    // Return the result of the deletion operation
    return $result;
}

public function update_cart_item_quantity($product_id, $customer_id, $quantity)
{
    // Convert parameters to integers
    $product_id = (int) $product_id;
    $customer_id = (int) $customer_id;
    $quantity = (int) $quantity;

    // Prepare the UPDATE query
    $query = "UPDATE cart SET qty = ? WHERE p_id = ? AND c_id = ?";
    $stmt = $this->conn->db_conn()->prepare($query);

    // Bind parameters and execute the query
    $stmt->bind_param("iii", $quantity, $product_id, $customer_id);
    $result = $stmt->execute();

    // Close the statement
    $stmt->close();

    // Return the result of the update operation
    return $result;
}

    
}


?>
