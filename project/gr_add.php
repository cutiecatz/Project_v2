<?php
require_once "server.php";
$id = $_POST['id'];
$sid = $_POST['sid'];
$in = $_POST['in'];
$po = $_POST['po'];
$store = $_POST['st'];
$gd = $_POST['gr_date'];
$com = $_POST['com'];
$id = $id+400000;
$userQuery = "INSERT into `goods receipt` values('$id','$in','$store','$com','$po','$gd')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: gr.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: gr.php");
}