<?php
require_once "server.php";
$id = $_POST['pr'];
$n = $_POST['name'];
$q = $_POST['qty'];


$userQuery = "INSERT INTO `pr detail`( `pr_id`,product_id ,`qty`) 
VALUES ('$id','$n','$q')";
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