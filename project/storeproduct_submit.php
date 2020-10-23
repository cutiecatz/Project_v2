<?php
require_once "server.php";
$id = $_POST['sid'];
$pid = $_POST['id'];
$qty = $_POST['qty'];
$Query = "SELECT * FROM `storage detail` WHERE product_id = $pid";
$res = mysqli_query($conn,$Query);
    while ($row2 = mysqli_fetch_assoc($res)){
        $stock = $row2['product_qty'];
        $total  = $stock +$qty ;
        $query2  = "UPDATE `storage detail` SET product_qty = $total WHERE product_id = '$pid' AND storage_id = '$id'";
        $result2 = mysqli_query($conn,$query2);
    }
header("Location: plant.php");

?>