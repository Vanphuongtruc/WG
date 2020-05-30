<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $port = 3306;
    $dbName = "test";

    // Create connection
    $conn = mysqli_connect("$servername:$port", $username, $password, $dbName);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "<p>Connected successfully</p>";




/*
    $sql = "CREATE TABLE productable (
                id  INT(20) not null primary key auto_increment,
                product_name VARCHAR(100),
                product_price FLOAT,
                product_image VARCHAR(100)
                
            )";
*/
/*
    if (mysqli_query($conn, $sql)) {
        echo "<p> Table student created successfully </p>";
      } else {
        echo "Error creating table: " . mysqli_error($conn);
      }
*/ 




?>