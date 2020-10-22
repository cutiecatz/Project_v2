<?php
require_once "server.php";
$id = $_POST['id'];
$v = $_POST['p'];
$c = $_POST['name'];


$userQuery = "INSERT into `storage` values($id,$v,'$c')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: store.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: store.php");
}