<?php
require_once "server.php";
$rfq_id = $_GET['id'];
$userQuery = "DELETE FROM `sale order` WHERE sale_id = '$rfq_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($conn));
}
else
{
    echo "successfully deleted the News<br></br>";
    header("location: so.php");
}
?>