<?php
include "tools.php";
session_start();




$error = false;
$required = array('username', 'email', 'mobile', 'creditcard');
foreach($required as $field) {
  if (empty($_SESSION[$field])) { 
    
    $error = true;
  }
}

if ($error) {
  header('location: index.php');
} 
preShow($_SESSION);
echo $_SESSION['username'];
?>