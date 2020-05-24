<?php
session_start();
include "tools.php";




// check if the input data is valid 
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
// write validate input into booking.txt
$myfile = fopen("bookings.txt","a");
$cells = array_merge(
    (array) $_SESSION["username"],
    (array) $_SESSION["email"],
    (array) $_SESSION["mobile"],
    (array) $_SESSION["creditcard"],
    (array) $_SESSION["dateTo"]
);
fputcsv($myfile, $cells);
fclose($myfile);
preShow($_SESSION);

?>
