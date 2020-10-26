<?php
require_once "server.php";
$id = $_POST['gr_id'];
$sto = $_POST['sto'];
$po = $_POST['po'];
$type = $_POST['type'];
$gd = $_POST['gr_date'];

$id = $id+400000;
$userQuery = "INSERT INTO `goods receipt`(`gr_id`,  `po_id`, `storage_id` , `delivery`, `gr_date`) values('$id','$po','$sto','$type','$gd')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: gr.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: gr.php");
}