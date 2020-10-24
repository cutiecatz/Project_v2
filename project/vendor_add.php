<?php
require_once "server.php";
$n = $_POST['name'];
$id = $_POST['id'];
$a = $_POST['add'];
$p = $_POST['phone'];
$post = $_POST['post'];
$m = $_POST['email'];
$c = $_POST['city'];
$post = $_POST['post'];
$userQuery = "INSERT INTO `vendor`(`vendor_id`, `vendor_name`, `vendor_address`, `vendor_city`, `vendor_postcode`, `vendor_email`, `vendor_phone`) 
                values('$id','$n','$a','$c','$post','$m','$p')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: vendor.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: vendor.php");
}