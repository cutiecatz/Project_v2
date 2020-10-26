<?php
require_once "server.php";
$id = $_POST['rfq_id'];
$v = $_POST['vendor_id'];
$com = $_POST['pr'];
$d = $_POST['date'];
$id2 = 3000+$id;
$userQuery = "INSERT into RFQ values('$id2','$com','$v','$d')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: rfq.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: rfq.php");
}