<?php
require("server.php");
$c=0;
$d=0;
$i=0;
$id = $_GET['id'];
$userQuery = "SELECT * FROM `RFQ` 
                                    JOIN `purchase requisition` USING (pr_id)
                                    JOIN `pr detail` USING (pr_id)
                                    JOIN product USING(product_id)
                                    WHERE RFQ_id = '$id'";
$result = mysqli_query($conn,$userQuery);



while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['qty'];
    $proid[$i] = $row['product_id'];
    $price[$i] = $row['product_price'];
    $net[$i] = $row['product_net'];
    $query = "INSERT INTO `rfq detail`(`rfq_id`, `product_id`, `qty`, `product_price`, `product_net`)
                 VALUES ('$id','$proid[$i]','$qty[$i]','$price[$i]','$net[$i]')";
    $result3 = mysqli_query($conn,$query);
$i++;
}
header("location: rfq.php");

?>