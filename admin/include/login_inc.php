<?php
if(isset($_POST['login'])){
    require 'dbh.php';

    $username = $_POST['logusername'];
    $password = $_POST['logpassword'];

    if(empty($username) || empty($password)){
        header("location ../login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM  data WHERE username=?; ";
        $stmt = mysqli_stmt_init($mysqli);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../login.php?error=emptyfields");
            exit();

        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordcheck = password_verify($password,$row['password']);
                if($passwordcheck == false){
                    header("location: ../login.php?error=wrongpassword");
                    exit(); 
                }
                else if($passwordcheck == true){
                    session_start();
                    $_SESSION['userid']= $row['id'];   
                    $_SESSION['username']= $row['username']  ;
                    header("location: ../admin.php?login=success")
                    exit();
                }
                else{
                    header("location: ../login.php?error=wrongpassword");
                    exit();
                }
            }
            else{
                header("location: ../login.php?error=nouser");
                exit();
            }
        }
    }

}else{
    header("location: ../login.php");
}
?>