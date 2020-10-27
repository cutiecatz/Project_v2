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
</head>
<body>
    <div class="middle">
        <div class="document">
            <header>
                    <div class="header">
                        <h1>Invoice</h1>
                        Invoice#: <?php echo $invoice_id;?><br>
                    </div>
            </header>
                <div class="date">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
							Invoice DATE :  <?php echo "".$row['sale_date']."" ?><br>
                    </div>
                    <!--------------- ------------->
                <div class="company">
                        <div>
                            <p class="Address-Heading_from">From : </p>
                            Company Name:  <?php echo "".$row['company_name']."" ?><br>
                            Address: <?php echo "".$row['company_address']."" ?><br>
                            <?php echo "".$row['company_city']." ".$row['company_post']." ".$row['company_country']."" ?><br>
                            E-mail: <?php echo "".$row['company_email']."" ?><br>
                            Phone : <?php echo "".$row['company_phone']."" ?><br>
                        </div>
                </div>
                    <!--------------- ------------->
                    <div class="customer">
                        <div>
                            <p class="Address-Heading_to">To : </p>
                            Customer Name:  <?php echo "".$row['customer_name']."" ?><br>
                            Address: <?php echo "".$row['customer_bill']."" ?><br>
                            <?php echo "".$row['customer_bill_city']." ".$row['customer_bill_zipcode']."" ?><br>
                            E-mail: <?php echo "".$row['customer_email']."" ?><br>
                            Phone : <?php echo "".$row['customer_phone']."" ?><br>
                            <?php }?>
                        </div>
                </div>
                    <!--------------- ------------->
                <div class="content">
                <table class="product">
                        <tr>
                            <th>Product#</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Unit/Price</th>
                            <th>Net Price</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result2)) { ?> 
                            <tr class="item">
                                <?php echo "<td>".$row['product_id']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['qty']."</td>" ?>
                                <?php echo "<td>".$row['discount']."</td>" ?>
                                <?php echo "<td>".$row['price']."</td>" ?>
                                <?php echo "<td>".$row['net']."</td>" ?>
                            </tr>
                        <?php } ?>
                        <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
                            <tr class="total"> 
                                <td></td>
                                <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                <td>Sub Total |<?php $t = $row['Total']; ?><?php  echo "".$row['Total']."";?></td> 
                            </tr>
                            <tr class="total">
                                <td></td>
                                <td></td>
                                            <td></td>
                                            <td></td>
                                            
                            <td>Tax | 7% <?php $tax = $row['TAX']; ?></td> 
                            </tr>
                            <tr class="total">
                                <td></td>
                                <td></td>
                                            <td></td>
                                            <td></td>
                                            
                            <td>Total | <?php echo $t+$tax; ?></td> 
                            </tr>
                        <?php } ?>
                    </table> 
                </div>
        </div>
    </div>
</body>
