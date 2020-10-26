<?php
require("server.php");
$c=0;
$d=0;
$i=0;
$id = $_GET['id'];
$userQuery = "SELECT * FROM `sale order` 
                                    JOIN quotation USING (quo_id)
                                    JOIN `quo detail` USING (quo_id)
                                    JOIN product USING(product_id)
                                    WHERE sale_id = '$id'";
$result = mysqli_query($conn,$userQuery);



while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['qty'];
    $proid[$i] = $row['product_id'];
    $price[$i] = $row['product_price'];
    $dis[$i] = $row['product_dis'];
    $net[$i] = $row['product_net'];
    $query = "INSERT INTO `sale detail`( `sale_id`, `product_id`, `qty`, `price`, `discount`, `net`)
                 VALUES ('$id','$proid[$i]','$qty[$i]','$price[$i]','$dis[$i]','$net[$i]')";
    $result3 = mysqli_query($conn,$query);
$i++;
}
header("location: so.php");

?>