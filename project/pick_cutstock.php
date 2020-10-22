<?php
require("server.php");
$id = $_GET['id'];
$userQuery = "SELECT * FROM picking JOIN `sale order` USING (sale_id)
                                    JOIN `sale detail` USING (sale_id)
                                    JOIN product USING(product_id)
                                    WHERE pick_id = '$id'";
$result = mysqli_query($conn,$userQuery);
$i=0;
while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['qty'];
    $sto[$i] = $row['storage_id'];
    $proid[$i] = $row['product_id'];
    $i++;
}
$c=0;
while($row2 = mysqli_fetch_assoc($result)){
$Query[$c] = "UPDATE `storage detail` SET `product_qty` = '80' WHERE `storage detail`.`sto_detail_id` = 4;";
$result[$c] = mysqli_query($conn,$Query[$c]);
$c++;
}

echo var_dump($qty);
echo var_dump($proid);
echo var_dump($sto);