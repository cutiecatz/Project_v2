<?php
require_once "server.php";
$pr_id = $_GET['id'];
$userQuery = "DELETE FROM pr detail WHERE pr_detail_id = '$pr_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($conn));
}
else
{
    echo "successfully deleted the News<br></br>";
    header("location: pr.php");
}
?>