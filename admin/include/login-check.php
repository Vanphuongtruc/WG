<?php
$username = $mysqli->escape_string($_POST['logusername']);
$result = $mysqli->query("SELECT * FROM data WHERE username='$username'");

if( $result->num_rows == 0){
   $_SESSION['message'] = "username does not exist!";
   header("location: login.php"); 

}
else{
   $user = $result->fetch_assoc();

   if ( $_POST['logpassword'] == $user['password'] ){
      $_SESSION['username'] = $user['username'];
      $_SESSION['password'] = $user['password'];
      $_SESSION['log_in'] = True;
      header("location: admin.php");
   }
   else{
      $_SESSION['message'] = "you have enter the wrong password,  try again";
      header("location: login.php");
   }
}
?>
