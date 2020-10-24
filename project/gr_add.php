<?php
require_once "server.php";
$id = $_POST['gr_id'];
$in = $_POST['in'];
$po = $_POST['po'];
$gd = $_POST['gr_date'];

$id = $id+400000;
$userQuery = "INSERT INTO `goods receipt`(`gr_id`, `invoice_id`, `po_id`, `gr_date`) values('$id','$in','$po','$gd')";
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