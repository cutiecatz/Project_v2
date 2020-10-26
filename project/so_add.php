<?php
require_once "server.php";
$id = $_POST['id'];
$quo = $_POST['quo'];
$em = $_POST['em'];
$d = $_POST['due_date'];
$s = $_POST['ship'];
$dev = $_POST['dev_date'];
$id2 = 300000+$id;
$userQuery = "INSERT INTO `sale order`(`sale_id`, `quo_id`, `employee_id`, `sale_due_date`, `ship_method`, `delivery_date`) 
      VALUES ('$id2','$quo','$em','$d','$s','$dev')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: so.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: so.php");
}