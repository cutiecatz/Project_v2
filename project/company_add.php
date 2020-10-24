<?php
require_once "server.php";
$id = $_POST['company_id'];
$n = $_POST['company_name'];
$c = $_POST['company_code'];
$a = $_POST['company_add'];
$m = $_POST['email'];
$t = $_POST['company_phone'];
$p = $_POST['company_post'];
$coun = $_POST['company_country'];
$city = $_POST['company_city'];
$userQuery = "INSERT into company values($id,'$c','$n','$a','$city',$p,'$coun','$m',$t)";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: COMPANY.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: COMPANY.php");
}