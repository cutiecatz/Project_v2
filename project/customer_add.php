<?php
require_once "server.php";
$n = $_POST['cus_name'];
$b = $_POST['add_bill'];
$ci1 = $_POST['add_bill_c'];
$zip1 = $_POST['add_bill_z'];
$ct1 = $_POST['add_bill_coun'];
$s = $_POST['add_ship'];
$ci2 = $_POST['add_ship_c'];
$zip2 = $_POST['add_ship_z'];
$ct2 = $_POST['add_ship_coun'];
$m = $_POST['mail'];
$t = $_POST['type'];
$p = $_POST['phone'];

$userQuery = "INSERT INTO `customer`( `customer_name`, `customer_bill`, `customer_bill_city`, `customer_bill_zipcode`, `customer_bill_country`, `customer_ship`, `customer_ship_city`, `customer_ship_zipcode`, `customer_ship_country`, `customer_email`, `customer_phone`, `customer_Type`) 
                VALUES ('$n','$b','$ci1','$zip1','$ct1','$s','$ci2','$zip2','$ct2','$m','$p','$t')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: customer.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: customer.php");
}