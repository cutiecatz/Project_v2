<?php
require_once "server.php";
$id = $_POST['pr'];
$n = $_POST['name'];
$p = $_POST['price'];
$q = $_POST['qty'];
$net = $p*$q;
$userQuery = "INSERT into `po detail`(`pr_id`, `product_id`, `qty`, `product_price`, `product_net`) values('$id',$n,$q,'$p','$net')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: prdetail.php?id=$id");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: prdetail.php?id=$id");
}