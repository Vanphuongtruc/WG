<?php 
session_start();
$mysqli = new mysqli('localhost','root','root','crud') or die(mysqli_error($mysql));

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mysqli ->query("INSERT INTO data(username, password) VALUES('$username','$password')") or
    die($mysqli->error);
    $_SESSION['message'] = "new account has beed added";
    $_SESSION['msg_type'] = "success";
    header("location: ../admin.php");

}

if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    $_SESSION['message'] = " account has beed deleted";
    $_SESSION['msg_type'] = "danger";
    header("location: ../admin.php");
 
    
}





?>