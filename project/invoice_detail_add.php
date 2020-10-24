<?php
require("server.php");
$c=0;
$d=0;
$i=0;
$id = $_GET['id'];
$userQuery = "SELECT * FROM invoice JOIN `sale order` USING (sale_id)
                                    JOIN `sale detail` USING (sale_id)
                                    JOIN product USING(product_id)
                                    WHERE invoice_id = '$id'";
$result = mysqli_query($conn,$userQuery);

while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['qty'];
    $sto[$i] = $row['storage_id'];
    $proid[$i] = $row['product_id'];
    $invoice[$i] = $row['invoice_id'];
    $query = "INSERT INTO `invoice detail`( `storage_id`,pick_id, `product_id`, `cut_qty`) VALUES ('$sto[$i]','$invoice[$i]','$proid[$i]','$qty[$i]')";
    $result3 = mysqli_query($conn,$query);
$i++;
}