<?php
require("server.php");
$pr_id = $_GET['id'];
$userQuery = "SELECT * FROM `purchase requisition` 
                        JOIN company  USING (company_id)
                        WHERE pr_id = $pr_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `pr detail` join product USING(product_id) where pr_id = '$pr_id'";
$result2 = mysqli_query($conn,$userQuery2);
$Query = "SELECT SUM(product_net * qty) AS Total, FORMAT(SUM((product_net)*0.07),2) as TAX FROM `pr detail` WHERE pr_id = '$pr_id'";
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
                <h1>Purchase Requisition</h1>
            </div>
                <div class="inv-header">
                    Purchase Requisition#: <?php echo $pr_id;?><br>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    Purchase Requisition DATE :  <?php echo "".$row['pr_date']."" ?><br>
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
                            <th>Price</th>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result2)) { ?> 
                        <tbody>
                            
                            <tr class="item">
                                <?php echo "<td>".$row['product_id']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['qty']."</td>" ?>
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
                                <td>INCLUDE </td> 
                            </tr>
                            <tr>
                                <th>Shipping Fees</th>
                                <td>INCLUDE</td> 
                            </tr>
                            <tr>
                                <th>Total</th> 
                                <td><?php echo $t; ?></td> 
                            </tr>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
