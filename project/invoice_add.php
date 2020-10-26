<?php
require_once "server.php";
$id = $_POST['invoice_id'];
$sale = $_POST['sale'];
$d = $_POST['date'];
$id = $id+5000;

$userQuery = "INSERT INTO `invoice`(`invoice_id`, `sale_id`, `invoice_date`, `invoice_tax`, `invoice_net`, `invoice_total`) 
                values('$id','$sale','$d',0,0,0)";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: invoice.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: invoice.php");
}