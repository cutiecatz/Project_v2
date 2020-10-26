<?php
require_once "server.php";
$id = $_POST['quo_id'];
$n = $_POST['name'];
$p = $_POST['price'];
$q = $_POST['qty'];
$userQuery = "SELECT * FROM quotation WHERE quo_id ='$id'";
$result = mysqli_query($conn,$userQuery);
while ($row = mysqli_fetch_assoc($result)) {
    $num = $row['material_dis'];
}
$t = $p*$q;
$d2 = ($t*($num/100));
$net = $t-$d2;
$userQuery = "INSERT INTO `quo detail`( `quo_id`, `product_id`, `qty`, `product_price`, `product_dis`, `product_net`) 
VALUES ('$id','$n','$q','$p','$d2','$net')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: quodetail.php?id=$id");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: quodetail.php?id=$id");
}