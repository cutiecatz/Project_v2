<?php
require_once "server.php";
$id = $_POST['po_id'];
$v = $_POST['v'];
$c = $_POST['c'];
$d = $_POST['date'];

$id2 = $id+1000;
$userQuery = "INSERT into `purchase order` values('$id2',$v,$c,'$d',0)";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: po.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: po.php");
}