<?php
require("server.php");
$c=0;
$d=0;
$i=0;
$id = $_GET['id'];
$userQuery = "SELECT * FROM picking JOIN `sale order` USING (sale_id)
                                    JOIN `sale detail` USING (sale_id)
                                    JOIN product USING(product_id)
                                    WHERE pick_id = '$id'";
$result = mysqli_query($conn,$userQuery);



while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['qty'];
    $sto[$i] = $row['storage_id'];
    $proid[$i] = $row['product_id'];
    $pick[$i] = $row['pick_id'];
    $pick_date[$i] = $row['pick_date'];
    $query = "INSERT INTO `cutstock`( `storage_id`,pick_id, `product_id`, `cut_qty`, `cut_date`) VALUES ('$sto[$i]','$pick[$i]','$proid[$i]','$qty[$i]','$pick_date[$i]')";
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
header("location: pick.php")


?>

      