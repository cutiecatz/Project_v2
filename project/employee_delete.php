<?php
require_once "server.php";
$po_id = $_GET['id'];
$userQuery = "DELETE FROM employee WHERE employee_id = '$po_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery ".mysqli_error($conn));
}
else
{
    echo "successfully deleted the News<br></br>";
    header("location: employee.php");
}
?>