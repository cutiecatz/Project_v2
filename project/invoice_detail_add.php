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
    $proid[$i] = $row['product_id'];
    $price = $row['price'];
    $dis = $row['discount'];
    $net = $row['net'];
    $query = "INSERT INTO `invoice detail`(`invoice_id`, `product_id`, `qty`, `price`, `discount`, `net`)
              VALUES ('$id','$proid[$i]','$qty[$i]','$price','$dis','$net')";
    $result3 = mysqli_query($conn,$query);
$i++;
}
header("location: invoice.php");