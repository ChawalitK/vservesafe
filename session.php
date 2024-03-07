<?php

//Written by Dominick Lee
//Last Modified 2/27/2017

//Enable the below two lines to show errors:
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

// include("database.class.php");	//Include MySQL database class
include("model/mysql.sessions.php");	//Include PHP MySQL sessions
$session = new Session();	//Start a new PHP MySQL session


//Store variable as usual
$_SESSION['user'] = "johnsmith@example.com";

// //Show stored user
// echo $_SESSION['user'];



// $session->_write("xxxxxxxcccccdddd","ccccccc");


//The following functions are used for sign-out:

//Clear session data (only data column)
//session_unset();

//Destroy the entire session
//session_destroy();

// echo "<hr><br>";

// define('SECRET_KEY', "fakesecretkey");
// function createToken($data)
// {
//     /* Create a part of token using secretKey and other stuff */
//     $tokenGeneric = SECRET_KEY.$_SERVER["SERVER_NAME"]; // It can be 'stronger' of course
//     /* Encoding token */
//     $token = hash('sha256', $tokenGeneric.$data);
//     return array('token' => $token, 'userData' => $data);
// }


// function auth($login, $password)
// {
//     // we check user. For instance, it's ok, and we get his ID and his role.
//     $userID = 1;
//     $userRole = "admin";
//     // Concatenating data with TIME
//     $data = time()."_".$userID."-".$userRole;
//     $token = createToken($data);
//     echo json_encode($token);
// }


// print_r(auth("login", "password"));


// //----------------------------------------------------

// function base64url_encode($data) {
//   $b64 = base64_encode($data);
//   if ($b64 === false) {
//     return false;
//   }
//   $url = strtr($b64, '+/', '-_');
//   return rtrim($url, '=');
// }

// $token  = "Bmn0c8rQDJoGTibk";                 // base64_encode(random_bytes(12));
// $secret = "yXWczx0LwgKInpMFfgh0gCYCA8EKbOnw"; // base64_encode(random_bytes(24));

// // RFC-defined structure
// $header = [
//     "alg" => "HS256",
//     "typ" => "JWT"
// ];

// // whatever you want
// $payload = [
//     "token" => $token,
//     "stamp" => "2020-01-02T22:00:00+00:00"    // date("c")
// ];

// $jwt = sprintf(
//     "%s.%s",
//     base64url_encode(json_encode($header)),
//     base64url_encode(json_encode($payload))
// );

// $jwt = sprintf(
//     "%s.%s",
//     $jwt,
//     base64url_encode(hash_hmac('SHA256', $jwt, base64_decode($secret), true))
// );

// var_dump($jwt);


?>