<?php
require("server.php");
$pick_id = $_GET['id'];
$userQuery = "SELECT * FROM `sale order` 
                        JOIN quotation USING (quo_id)
                        JOIN employee  USING (employee_id)
                        JOIN company  USING (company_id)
                       WHERE sale_id = $sale_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `sale detail` p join product d USING(product_id) where sale_id = '$sale_id'";
$result2 = mysqli_query($conn,$userQuery2);
?>