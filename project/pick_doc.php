<?php
require("server.php");
$pick_id = $_GET['id'];
$userQuery = "SELECT * FROM `picking` 
                        JOIN `sale order` USING (sale_id)
                        JOIN quotation USING (quo_id)
                        JOIN inquiry USING (inquiry_id)
                        JOIN storage USING (storage_id)
                        JOIN employee  USING (employee_id)
                        JOIN company  USING (company_id)
                        JOIN customer USING (customer_id)
                       WHERE pick_id = $pick_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `cutstock`  
                                join product USING(product_id)
                                join `storage detail` USING(storage_id, product_id)
                                where pick_id = '$pick_id'";
$result2 = mysqli_query($conn,$userQuery2);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../project/css/doc.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"rel="stylesheet"/>

</head>
<body>
    <div class="container">
        <div class="document">
            <div style = "justify-content: space-around">
                <h1>Picking Document</h1>
                <div>
                    Picking Document#: <?php echo $pick_id;?><br>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    Picking DATE :  <?php echo "".$row['pick_date']."" ?><br>
                </div>
            </div>
                <div class="inv-header">
                    <!--------------- ------------->
                    <div class="box_left">
                        <div>
                            <h2><p class="Address-Heading_from"> <br><br>  From : </p></h2>
                            <ul>
                                <li>Name:  <?php echo "".$row['company_name']."" ?></li> 
                                <li>Address: <?php echo "".$row['company_address']."" ?>
                                <?php echo "".$row['company_city']." ".$row['company_post']." ".$row['company_country']."" ?></li> 
                                <li>E-mail: <?php echo "".$row['company_email']."" ?></li> 
                                <li>Phone : <?php echo "0".$row['company_phone']."" ?></li> 
                            </ul>
                        </div>
                    </div>
                    <!--------------- ------------->
                    <div class="box_right">
                        <div>
                            <h2><p class="Address-Heading_from"> <br><br> To : </p></h2>
                            <ul>
                                <li>Name:  <?php echo "".$row['company_name']."" ?></li>
                                <li>Address: <?php echo "".$row['company_address']."" ?>
                                <?php echo "".$row['company_city']." ".$row['company_post']." ".$row['company_country']."" ?></li>
                                <li>E-mail: <?php echo "".$row['company_email']."" ?></li>
                                <li>Phone : <?php echo "0".$row['company_phone']."" ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--------------- ------------->
                <div class="inv-body">
                    <table class="info">
                            <thead>
                                <th>Order#</th>
                                <th>S.O.Date</th>
                                <th>Shipped VIA</th>
                                <th>Delivery Date</th>
                                <th>F.O.B. Point </th>
                                <th>TERMS </th>
                            </thead>
                            <tbody class="order_info">
                                <tr>
                                    <?php echo "<td>".$row['sale_id']."</td>" ?>
                                    <?php echo "<td>".$row['sale_date']."</td>" ?>
                                    <?php echo "<td>".$row['ship_method']."</td>" ?>
                                    <?php echo "<td>".$row['sale_due_date']."</td>" ?>
                                    <?php echo "<td> Destination </td>" ?>
                                    <?php echo "<td> Net 30 </td>" ?>
                                    <?php } ?>
                                </tr>
                            </tbody>
                    </table>
                    <!--------------- -------------> <br><br>
                    <table class="stock">
                        <thead>
                            <th>Product#</th>
                            <th>Product Description</th>
                            <th>Quantity Ordered</th>
                            <th>Storage Location</th>
                            <th>Quantity Packed</th>
                            <th>Storage Location</th>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
                        <tbody>
                            <tr class="order_info">
                                <?php echo "<td>".$row['product_id']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['cut_qty']."</td>" ?>
                                <?php echo "<td>".$row['storage_id']."</td>" ?>
                                <?php echo "<td>".$row['product_qty']."</td>" ?>
                                <?php echo "<td>".$row['storage_id']."</td>" ?>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>