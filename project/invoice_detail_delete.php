<?php
require_once "server.php";
$invoice_id = $_GET['id'];
$userQuery = "DELETE FROM `invoice detail` WHERE invoice_detail_id = '$invoice_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($conn));
}
else
{
    echo "successfully deleted the News<br></br>";
    header("location: invoice.php");
}
?>