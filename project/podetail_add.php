<?php
require_once "server.php";
$id = $_GET['id'];
$n = $_POST['name'];
$p = $_POST['price'];
$q = $_POST['qty'];
$ne = $p * $q;

$userQuery = "INSERT into `po detail`(`po_id`, `product_id`, `qty`, `product_price`, `product_net`) values('$id',$n,$q,'$p','$ne')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: podetail.php?id=$id");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: podetail.php?id=$id");
}



