<?php
require_once "server.php";
$v_id = $_GET['id'];
$userQuery = "DELETE FROM plant WHERE plant_id = '$v_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($conn));
}
else
{
    echo "successfully deleted the Plant<br></br>";
    header("location: plant.php");
}
?>