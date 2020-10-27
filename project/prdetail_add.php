<?php
require_once "server.php";
$id = $_POST['pr'];
$n = $_POST['name'];
$q = $_POST['qty'];
$p = $_POST['price'];

$userQuery = "INSERT INTO `pr detail`( `pr_id`,product_id ,`qty`,`product_net`) 
VALUES ('$id','$n','$q', '$p')";
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