<?php
require_once "server.php";
$id = $_POST['id'];
$fq = $_POST['name'];
$d = $_POST['des'];
$w = $_POST['weight'];

$userQuery = "INSERT into product values('$id','$fq','$w','$d')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: product.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: product.php");
}