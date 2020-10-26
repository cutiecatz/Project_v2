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
    $query = "INSERT INTO `rfq detail`(`rfq_id`, `product_id`, `qty`)
                 VALUES ('$id','$proid[$i]','$qty[$i]')";
    $result3 = mysqli_query($conn,$query);
$i++;
}
header("location: rfq.php");

?>