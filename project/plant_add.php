<?php
require_once "server.php";
$id = $_POST['plant_id'];
$v = $_POST['name'];
$c = $_POST['company_id'];


$userQuery = "INSERT into `plant` values('$id',$c,'$v')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: plant.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: plant.php");
}