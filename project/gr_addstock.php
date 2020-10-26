<?php
require("server.php");
$c=0;
$d=0;
$i=0;
$id = $_GET['id'];
$userQuery = "SELECT * FROM `goods receipt` JOIN `purchase order` USING (po_id)
                                    JOIN `po detail` USING (po_id)
                                    JOIN product USING(product_id)
                                    WHERE gr_id = '$id'";
$result = mysqli_query($conn,$userQuery);



while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['qty'];
    $proid[$i] = $row['product_id'];
    $query = "INSERT INTO `gr detail`(`gr_id`, `product_id`, `qty`) VALUES ('$id','$proid[$i]','$qty[$i]')";
    $result3 = mysqli_query($conn,$query);
    $Query = "SELECT * FROM cutstock JOIN `storage detail` USING (storage_id,`product_id`) WHERE product_id = $proid[$i]";
    $res = mysqli_query($conn,$Query);
    while ($row2 = mysqli_fetch_assoc($res)){
        $stock = $row2['product_qty'];
        $cut  = $row2['cut_qty'];
        $pdid  = $row2['product_id'];
        $stoid  = $row2['storage_id'];
        $total  = $stock - $cut ;
        $query2  = "UPDATE `storage detail` SET product_qty = $total WHERE product_id = '$pdid' AND storage_id = '$stoid'";
        $result2 = mysqli_query($conn,$query2);
        $d++;
    }
$i++;
}
header("location: gr.php")


?>