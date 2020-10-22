<?php
require_once "server.php";

$cus_id = $_GET['id'];
$n =$_POST['name'];
$b = $_POST['bill'];
$s = $_POST['ship'];
$m = $_POST['mail'];
$p = $_POST['phone'];
$t = $_POST['type'];


$userQuery = "UPDATE customer SET customer_name = '$n',
                                 customer_bill ='$b',
                                 customer_ship = '$s',
                                 customer_email = '$m',
                                 customer_phone = '$p',
                                 customer_Type = '$t' 
                                 WHERE customer_id = $cus_id";
                                 
$result = mysqli_query($conn,$userQuery);
if(!$result){
    die("Could not succesfully run the query $userQuery ".mysqli_error($conn));
}
else{
    echo "Successfully updated the News <br><br>";
    header("location: customer.php");
   

}
?>