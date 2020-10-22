<?php
require_once "server.php";
$id = $_POST['id'];
$com = $_POST['cn'];
$d = $_POST['date'];
$d2 = $_POST['due_date'];
$id2 = 100000+$id;
$userQuery = "INSERT into `inquiry` values('$id2','$com','$d','$d2')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: iq.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: iq.php");
}