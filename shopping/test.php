
<?php
include_once 'ded.php';
//get data from database
$sql = "SELECT * FROM productable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

      echo $row["product_name"]. " | " . $row["product_price"]. " | " . $row["product_image"].   "<br>";
    }
  } else {
    echo "0 results";
  }
?>
