<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php session_start(); 
    $username =$_SESSION['userdata']['username'] ;
    $accounts = $_SESSION['userlist'];
    require_once 'include/process.php';
    $mysqli = new mysqli('localhost','root','root','crud') or die(mysqli_error($mysql));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    function pre_r($array){
        echo'<pre>';
        print_r($array);
        echo'</pre>';
    }

    
    

    
        

    
    ?>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="admin.css" type="text/css">
</head>

<body >
    <!-- Page Preloder -->


    

    <!-- Header Section Begin -->
    <a href="./index.html"><img src="../img/logo.png" alt="" style="position: absolute;"></a>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                               <?php if($_SESSION['log_in']){
                                   $name = $_SESSION['username'];
                                   echo "<p id='user'> wellcome $name</p>";
                                   echo "<a href='logout.php' id='login'><i class='fa fa-user'></i> logout</a>";}
                                   else{
                                   echo "<a href='login.php' id='login'><i class='fa fa-user'></i> login</a>";}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="admin-wrapper">
            <div class="left-side-bar">
                <ul class="button-container">
                    <li>
                        <div class="dropdown">
                        <a href="admin.php"><button>Add admin users</button></a>

                    </li>
                    <li>
                        <div class="dropdown">
                        <a href="admin1.php"><button class="dropbtn">Modify Shop Items</button></a>
 
                        </div>
                    </li>

                </ul>
            </div>

            <div class="admin-content">
                <div class="title">
                    <h2>Admin </h2>
                </div>
                <div class="content">
                    <div class="user-data">
                        <h3> admin users list</h3>
                    </div>
                    <div class="data-modifier">

                        <table>
                            <thead>
                                <tr>
                                <th>N</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>action<th>
                                </tr>

                            </thead>
                        <?php 
                            while($row = $result->fetch_assoc()): ?>
                                <tr>

                                    <td><?php echo "n"; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><a href="include/process.php?delete=<?php echo $row['id'];?>">delete</a><td>
                                </tr>
                            <?php endwhile;?>

                      
                        </table>
             

              
                    </div>
                    <div class="adduser" style="position:relative;top:20px;;left: 400px;display:inline-block;">
                    <form action="include/process.php" method="post"> 
                                Name:<input type="text" name="username" placeholder="enter your name">
                                Password:<input type="text" name="password" placeholder="enter your password">
                                <button type="submit" name="add">add</button>
                    </form>
                    </div>
                </div>
            </div>

        </div >

