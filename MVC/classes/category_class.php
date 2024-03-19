<?php
//connect to database class
require_once("C:/xampp/htdocs/MVC/MVC/settings/db_class.php");

/**
 * General class to handle all category functions 
 */
/**
 * @author David Sampah
 *
 */
class category_class extends db_connection
{
    //--INSERT--//
    public function add_category($cat_name)
    {
        $ndb = new db_connection();
        $cat_name = mysqli_real_escape_string($ndb->db_conn(), $cat_name);

        $sql = "INSERT INTO `categories`(`cat_name`) 
                VALUES ('$cat_name')";
        return $this->db_query($sql);
    }

    //--UPDATE--//
    public function update_category($cat_id, $cat_name)
    {
        $ndb = new db_connection();
        $cat_id = (int) $cat_id; // Convert to integer
        $cat_name = mysqli_real_escape_string($ndb->db_conn(), $cat_name);

        $sql = "UPDATE `categories` SET 
                    `cat_name` = '$cat_name' 
                WHERE `cat_id` = '$cat_id'";

        return $this->db_query($sql);
    }

    //--SELECT--//
    public function get_all_categories()
    {
        $ndb = new db_connection();

        // Use prepared statement to prevent SQL injection
        $stmt = $ndb->db_conn()->prepare("SELECT * FROM categories");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            // Query failed
            // Handle the error, log it, or return an appropriate response
            return false;
        }

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $categories = array();
            // Fetch each category row
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
            return $categories; // Return an array of categories
        } else {
            return false; // No categories found
        }
    }

    public function delete_category($cat_id)
    {
        $ndb = new db_connection();
        $cat_id = (int) $cat_id; // Convert to integer

        // Prepare the SQL statement
        $stmt = $ndb->db_conn()->prepare("DELETE FROM `categories` WHERE `cat_id` = ?");

        // Bind parameters
        $stmt->bind_param("i", $cat_id);

        // Execute the statement
        $result = $stmt->execute();

        // Close the statement
        $stmt->close();

        return $result;
    }
}
?>
