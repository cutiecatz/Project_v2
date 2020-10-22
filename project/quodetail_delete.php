<?php
require_once "server.php";
$quo_id = $_GET['id'];
$userQuery = "DELETE FROM `quo detail` WHERE quo_detail_id = '$quo_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($conn));
}
else
{
    echo "successfully deleted the News<br></br>";
    header("location: quo.php");
}
?>