<?php
require_once "server.php";
$id = $_POST['id'];
$sid = $_POST['sid'];
$store = $_POST['st'];
$pd = $_POST['pick_date'];
$id2 = 400000+$id;
$userQuery = "INSERT into `picking` values('$id2','$sid','$store','$pd')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: pick.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: pick.php");
}