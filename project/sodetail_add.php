<?php
require_once "server.php";
$id = $_POST['id'];
$n = $_POST['name'];
$p = $_POST['price'];
$q = $_POST['qty'];
$d = $_POST['dis'];
$t = $p*$q;
$d2 = $t*($d/100);
$net = $t-$d2;
$userQuery = "INSERT INTO `sale detail`( `sale_id`, `product_id`, `qty`, `price`, `discount`, `net`)
 VALUES ('$id','$n','$q','$p','$d2','$net')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: sodetail.php?id=$id");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: sodetail.php?id=$id");
}