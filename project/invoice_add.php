<?php
require_once "server.php";
$id = $_POST['invoice_id'];
$cus = $_POST['cus'];
$com = $_POST['com'];
$d = $_POST['date'];
$id2 = 500000+$id;
$userQuery = "INSERT into `invoice` values('$id',$cus,$com,'$d',0,0,0)";
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