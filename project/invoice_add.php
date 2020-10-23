<?php
require_once "server.php";
$id = $_POST['invoice_id'];
$id2 = $_POST['sale'];
$cus = $_POST['cus'];
$com = $_POST['com'];
$sale = $_POST['sale'];
$d = $_POST['date'];
$id = $id+5000;

$userQuery = "INSERT into `invoice` 
                values('$id','$cus','$sale','$com','$d',0,0,0)";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: invoice.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: invoice.php");
}