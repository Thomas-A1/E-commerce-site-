<?php
//connect to the user account class
include("../classes/user_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){email
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function add_user_ctr($user_role, $customer_email, $password_hash, $customer_name,  $customer_country, $customer_city, $customer_contact, $customer_image){

	$adduser=new customer_class();

	return $adduser->add_user($user_role, $customer_email, $password_hash, $customer_name,  $customer_country, $customer_city, $customer_contact, $customer_image);

}

//--SELECT--//
function login_user_ctr($customer_email, $password_hash)
{
    $userClass = new user_class();
    $result = $userClass->verify_login($customer_email, $password_hash);
 return $result;
  
}
//--UPDATE--//


//--DELETE--//


?>