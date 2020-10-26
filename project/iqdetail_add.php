<?php
require_once "server.php";
$id = $_POST['id'];
$n = $_POST['name'];
$q = $_POST['qty'];


$userQuery = "INSERT into `inquiry detail`(`inquiry_id`, `product_id`, `product_qty`) values('$id',$n,$q)";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: iqdetail.php?id=$id");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: iqdetail.php?id=$id");
}
