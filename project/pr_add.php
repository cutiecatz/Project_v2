<?php
require_once "server.php";
$id = $_POST['pr_id'];
$com = $_POST['com'];
$d = $_POST['date'];
$id2 = 2000+$id;
$userQuery = "INSERT into `purchase requisition` values('$id2','$com','$d')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: pr.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: pr.php");
}