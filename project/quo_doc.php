<?php
require("server.php");
$quo_id = $_GET['id'];
$userQuery = "SELECT * FROM `quotation` 
                       JOIN vendor  USING (vendor_id)
                       JOIN company  USING (company_id)
                       JOIN rfq  USING (rfqr_id)
                       WHERE quo_id = $quo_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `inquiry detail` p inner join product d ON p.product_id = d.product_id where inquiry_id = '$inquiry_id'";
$result2 = mysqli_query($conn,$userQuery2);
?>