<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <?php 
        session_start();
        $mysqli = new mysqli('localhost','root','root','crud') or die(mysqli_error($mysql));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        print_r($result->fetch_assoc());
    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        if(isset($_POST['login'])){
            require 'include/login-check.php';
        }
    }

    ?>

</head>
<body>
 
    <div class="banner-img"></div>
    <img src="../img/logo.png" alt="logo" style="position:absolute; left: 50%;">
    <form class="loginForm" action="login.php" method="post">
        <img src="../img/logo.png" alt="logo" >
        <h1>Login Form</h1><span>
        Username:<input type="text" name="logusername" id="username" placeholder="enter your username">
        <p></p>
        password:<input type="password" name="logpassword" id="password" placeholder="enter your password">
        <p></p>

        <button type="submit" name="login" onclick="user_input()">login</button>
        <?php if(isset($_SESSION['message'])){
            $error = $_SESSION['message'];
            echo "<p style='color:red;'>$error</p>";
        }
            ?>
    </form>

 <script src="js/login.js" ></script>
</body>

</html>