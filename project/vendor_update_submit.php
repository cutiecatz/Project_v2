<?php
require_once "server.php";

$cus_id = $_GET['id'];
$n =$_POST['name'];
$b = $_POST['add'];
$m = $_POST['mail'];
$p = $_POST['phone'];
$c = $_POST['city'];
$post = $_POST['post'];



$userQuery = "UPDATE vendor SET vendor_name = '$n',
                                vendor_address ='$b',
                                vendor_city = '$c',
                                vendor_postcode = '$post',
                                vendor_email = '$m',
                                vendor_phone = '$p'
                                 WHERE vendor_id = $cus_id";
                                 
$result = mysqli_query($conn,$userQuery);
if(!$result){
    die("Could not succesfully run the query $userQuery ".mysqli_error($conn));
}
else{
    echo "Successfully updated the News <br><br>";
    header("location: vendor.php");
   

}
?>