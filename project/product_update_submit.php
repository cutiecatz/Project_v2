<?php
require_once "server.php";

$cus_id = $_GET['id'];
$n =$_POST['name'];
$d = $_POST['desc'];



$userQuery = "UPDATE product SET product_name = '$n',
                                    product_descrip = '$d'
                             WHERE product_id = $cus_id";
                                 
$result = mysqli_query($conn,$userQuery);
if(!$result){
    die("Could not succesfully run the query $userQuery ".mysqli_error($conn));
}
else{
    echo "Successfully updated the News <br><br>";
    header("location: product.php");
   

}
?>