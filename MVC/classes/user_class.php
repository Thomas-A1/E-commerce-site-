<?php
//connect to database class
require_once("C:/xampp/htdocs/MVC/MVC/settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

//  public function add_brand($a,$b)
// 	{
// 		$ndb = new db_connection();	
// 		$name =  mysqli_real_escape_string($ndb->db_conn(), $a);
// 		$desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
// 		$sql="INSERT INTO `brands`(`brand_name`, `brand_description`) VALUES ('$name','$desc')";
// 		return $this->db_query($sql);
// 	}
class user_class extends db_connection
{
	//--INSERT--//
    public function add_register($user_role, $customer_email, $password_hash, $customer_name, $customer_country, $customer_city, $customer_contact, $customer_image)
    {
        $ndb = new db_connection();
        $user_role = 2;
        $customer_email = mysqli_real_escape_string($ndb->db_conn(), $customer_email);
        $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);
        $customer_name = mysqli_real_escape_string($ndb->db_conn(), $customer_name);
        $customer_country = mysqli_real_escape_string($ndb->db_conn(), $customer_country);
        $customer_city = mysqli_real_escape_string($ndb->db_conn(), $customer_city);
        $customer_contact = mysqli_real_escape_string($ndb->db_conn(), $customer_contact);
        $customer_image = mysqli_real_escape_string($ndb->db_conn(), $customer_image);
    
        $sql = "INSERT INTO `customer`(`user_role`, `customer_email`, `customer_pass`, `customer_name`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`) 
                VALUES ('$user_role', '$customer_email', '$password_hash', '$customer_name', '$customer_country', '$customer_city', '$customer_contact', '$customer_image')";
        return $this->db_query($sql);
    }
    //--SELECT--//
    public function verify_login($customer_email, $password_hash)
    {
        $ndb = new db_connection();
        $customer_email = mysqli_real_escape_string($ndb->db_conn(), $customer_email);

        // Use prepared statement to prevent SQL injection
        $stmt = $ndb->db_conn()->prepare("SELECT * FROM `customer` WHERE `customer_email`=?");
        $stmt->bind_param("s", $customer_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            // Query failed
            // Handle the error, log it, or return an appropriate response
            return false;
        }
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['customer_pass'];

            // Use password_verify to check hashed password
            if (password_verify($password_hash, $hashedPassword)) {
                return true; // Login successful
            }
        }

        return false; // Login failed
    }
	
	//--UPDATE--//



    public function get_user_by_email($customer_email)
    {
        $ndb = new db_connection();
        $customer_email = mysqli_real_escape_string($ndb->db_conn(), $customer_email);

        // Prepare and execute SQL statement to retrieve user by email
        $stmt = $ndb->db_conn()->prepare("SELECT * FROM `customer` WHERE `customer_email`=?");
        $stmt->bind_param("s", $customer_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false || $result->num_rows === 0) {
            // User not found or query failed
            return null;
        }

        // Fetch the user details
        $user = $result->fetch_assoc();
        return $user;
    }
	//--DELETE--//
    public function get_user_id_by_email($customer_email)
{
    $ndb = new db_connection();
    $customer_email = mysqli_real_escape_string($ndb->db_conn(), $customer_email);

    // Prepare and execute SQL statement to retrieve user ID by email
    $stmt = $ndb->db_conn()->prepare("SELECT `customer_id` FROM `customer` WHERE `customer_email`=?");
    $stmt->bind_param("s", $customer_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false || $result->num_rows === 0) {
        // User not found or query failed
        return null;
    }

    // Fetch the user ID
    $user_id = $result->fetch_assoc()['customer_id'];
    return $user_id;
}

	

}

?>