<?php 
$mysqli1 = new mysqli('localhost','root','root','productdb') or die(mysqli_error($mysql1));
if (isset($_POST['add1'])){
    $file =$_FILES['file'];
    $product_name = $_POST['product_name'];
    $product_price= $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILS['file']['type'];
    $fileTMP = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];    
    $fileSize = $_FILES['file']['size'];
    $fileExit = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExit));
    $allowed = array('jpg','jpeg','png','pdf');


    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNewName = $fileName;
                $fileDestination = 'uploads/'.$fileNewName;
                move_uploaded_file($fileTMP,$fileDestination);
                $sql = "INSERT IGNORE INTO producttb(product_name, product_price,product_image) VALUES('$product_name','$product_price','$fileDestination')";
                $mysqli1->query($sql) or die($mysqli1->error);
                header("location: admin1.php?uploadsuccess");
            }else{
                echo"your file is too big";
            }
        }else{
            echo"there was an error uploading your file";
        }
    }else{
        echo"you can not upload file of this type";
    }

}
?>