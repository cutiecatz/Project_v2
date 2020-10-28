<?php
require("server.php");
$invoice_id = $_GET['id'];
$userQuery = "SELECT * FROM `invoice` 
                        JOIN `sale order` USING (sale_id)
                        JOIN quotation USING (quo_id)
                        JOIN inquiry USING (inquiry_id)
                        JOIN customer USING (customer_id)
                        JOIN employee  USING (employee_id)
                        JOIN company  USING (company_id)
                       WHERE invoice_id = $invoice_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `invoice detail` p join product d USING(product_id) where invoice_id = '$invoice_id'";
$result2 = mysqli_query($conn,$userQuery2);
$Query = "SELECT SUM(net) AS Total, FORMAT(SUM((net)*0.07),2) as TAX FROM `invoice detail` WHERE invoice_id = '$invoice_id'";
$result3 = mysqli_query($conn,$Query);
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
            <div>
                <h1>Invoice</h1>
            </div>
                <div class="inv-header">
                    Invoice#: <?php echo $invoice_id;?><br>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    Invoice DATE :  <?php echo "".$row['sale_date']."" ?><br>
                    <!--------------- ------------->
                    <div class="box_left">
                        <div>
                            <h2><p class="Address-Heading_from">From : </p></h2>
                            <ul>
                                <li>Company Name:  <?php echo "".$row['company_name']."" ?></li>
                                <li>Address: <?php echo "".$row['company_address']."" ?>
                                <?php echo "".$row['company_city']." ".$row['company_post']." ".$row['company_country']."" ?></li>
                                <li>E-mail: <?php echo "".$row['company_email']."" ?></li>
                                <li>Phone : <?php echo "".$row['company_phone']."" ?></li>
                            </ul>
                        </div>
                    </div>
                    <!--------------- ------------->
                    <div class="box_right">
                        <div>
                            <h2><p class="Address-Heading_to">To : </p></h2>
                            <ul>
                                <li>Customer Name:  <?php echo "".$row['customer_name']."" ?></li>
                                <li>Address: <?php echo "".$row['customer_bill']."" ?>
                                <?php echo "".$row['customer_bill_city']." ".$row['customer_bill_zipcode']."" ?></li>
                                <li>E-mail: <?php echo "".$row['customer_email']."" ?></li>
                                <li>Phone : <?php echo "".$row['customer_phone']."" ?></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--------------- ------------->
                <div class="inv-body">
                    <table class="product">
                            <thead>
                                <th>Product#</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Unit/Price</th>
                                <th>Net Price</th>
                            </thead>
                            <?php while ($row = mysqli_fetch_assoc($result2)) { ?> 
                            <tbody>
                                <tr class="item">
                                    <?php echo "<td>".$row['product_id']."</td>" ?>
                                    <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                    <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                    <?php echo "<td>".$row['qty']."</td>" ?>
                                    <?php echo "<td>".$row['discount']."</td>" ?>
                                    <?php echo "<td>".$row['price']."</td>" ?>
                                    <?php echo "<td>".$row['net']."</td>" ?>
                                </tr>
                            </tbody>
                            <?php } ?>
                    </table> 
                </div>
                    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
                    <div class ="inv-footer">
                    <div><!-- required --></div>
                    <div>
                        <table>
                            <tr> 
                                <th>Sub Total</th>
                                <td><?php $t = $row['Total']; ?><?php  echo "".$row['Total']."";?></td> 
                            </tr>
                            <tr>
                                <th>Tax</th> 
                                <td>7% <?php $tax = $row['TAX']; ?></td> 
                                
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td><?php echo $t+$tax; ?></td> 
                            </tr>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
