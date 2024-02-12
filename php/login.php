<?php

include_once("db.class.php");
session_start();
$dbhost = 'localhost';
$dbuser = 'webusers';
$dbpass = '!QAZxsw2#';
$dbname = 'vservesafe';
$db = new db($dbhost, $dbuser, $dbpass, $dbname);

function getProfile($user_id) {
  global $db;
  $profile = $db->query('SELECT * FROM profiles WHERE user_id = ? limit 1', $user_id)->fetchArray();
  return $profile;
}


if((isset($_POST['username']) && strlen($_POST['username']) > 0) && 
    (isset($_POST['password']) && strlen($_POST['password']) > 0)){

      $user = $db->query('SELECT * FROM users WHERE username = ? AND password = password(?) limit 1', $_POST['username'], $_POST['password'])->fetchArray();

      if(count($user) > 0){
        $error_message = "";
        // $_SESSION = $user;
        // echo "login";
        $profile = getProfile($user['id']);
        $_SESSION = array_merge($user, $profile);
        header("location:shedein_food_safety_management.php");
        // print_r($_SESSION);
      }else{
        $_SESSION = [];
        $error_message = "Wrong username or password !!";
      }

}else{
    $error_message = "";
    // header("location:".$_SERVER['PHP_SELF']);
}

// print_r($_SESSION);


?>