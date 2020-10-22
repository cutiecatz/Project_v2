<?php
require_once "server.php";
$id = $_POST['id'];
$v = $_POST['v'];
$c = $_POST['c'];
$r = $_POST['r'];
$d = $_POST['date'];
$id2= $id+5000;
$userQuery = "INSERT into `quotation` values('$id2','$v','$c','$r','$d')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: quo.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: quo.php");
}