<?php
require("server.php");
$po_id = $_GET['id'];
$userQuery = "SELECT * FROM `purchase order` 
                       JOIN  rfq USING (rfq_id) 
                       JOIN `purchase requisition` USING (pr_id)
                       JOIN vendor USING (vendor_id)
                       JOIN company USING (company_id)
                       WHERE po_id = '$po_id'";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `po detail` p inner join product d ON p.product_id = d.product_id where po_id = '$po_id'";
$result2 = mysqli_query($conn,$userQuery2);
$Query = "SELECT SUM(product_net) AS Total, FORMAT(SUM((product_net)*0.07),2) as TAX FROM `po detail` WHERE po_id = '$po_id'";
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
            <div style = "justify-content: space-around">
                <h1>Purchase Order</h1>
                <div>
                    Purchase Order #: <?php echo $po_id;?><br>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    DATE :  <?php echo "".$row['po_date']."" ?><br>
                </div>
            </div>
            <div class="inv-header">
                <!--------------- ------------->
                <div class="box_left">
                    <div>
                        <H2><p class="Address-Heading_from">From :</p></H2>
                        <ul>
                            <li>Vendor Name:  <?php echo "".$row['vendor_name']."" ?></li>
                            <li>Address: <?php echo "".$row['vendor_address']."" ?>
                            <?php echo "".$row['vendor_city']." ".$row['vendor_postcode']."" ?></li>
                            <li>E-mail: <?php echo "".$row['vendor_email']."" ?></li>
                            <li>Phone : <?php echo "".$row['vendor_phone']."" ?></li>
                        </ul>
                    </div>
                </div>
                <!--------------- ------------->                   
                <div class="box_right">
                    <div>
                        <h2><p class="Address-Heading_from">SHIP TO</p></h2>
                        <ul>
                            <li>Vendor Name:  <?php echo "".$row['company_name']."" ?></li>
                            <li>Address: <?php echo "".$row['company_address']."" ?>
                            <?php echo "".$row['company_city']." ".$row['company_post']."" ?></li>
                            <li>E-mail: <?php echo "".$row['company_email']."" ?></li>
                            <li>Phone : <?php echo "".$row['company_phone']."" ?></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>  
            <!--------------- ------------->
            <div class="inv-body">
                <table class="product">
                    <thead>
                        <th> Item</th>
                        <th> Product Description</th>
                        <th> Qty</th>
                        <th> Unit Price</th>
                        <th> Total</th>     
                    </thead>
                    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>    
                    <tbody>
                        <tr class="item">
                            <?php echo "<td>".$row['product_name']."</td>" ?>
                            <?php echo "<td>".$row['product_descrip']."</td>" ?>
                            <?php echo "<td>".$row['qty']."</td>" ?>
                            <?php echo "<td>".$row['product_price']."</td>" ?>
                            <?php echo "<td>".$row['product_net']."</td>" ?>                     
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
            <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
            <div class ="inv-footer">
            <div><!-- required --></div>
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
</body>
</html>