<?php
require("server.php");
$pr_id = $_GET['id'];
$userQuery = "SELECT * FROM `purchase requisition` 
                        JOIN company  USING (company_id)
                        WHERE pr_id = $pr_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `pr detail` join product USING(product_id) where pr_id = '$pr_id'";
$result2 = mysqli_query($conn,$userQuery2);
$Query = "SELECT SUM(product_net) AS Total, FORMAT(SUM((product_net)*0.07),2) as TAX FROM `pr detail` WHERE pr_id = '$pr_id'";
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
                        <h1>Purchase Requisition</h1>
                        Purchase Requisitionn#: <?php echo $pr_id;?><br>
                    </div>
                </header>
                <div class="date">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    Purchase Requisitionn DATE :  <?php echo "".$row['pr_date']."" ?><br>
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
                            <th>Price</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result2)) { ?> 
                            <tr class="item">
                                <?php echo "<td>".$row['product_id']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['qty']."</td>" ?>
                                <?php echo "<td>".$row['product_net']."</td>" ?>
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
                                            
                            <td>Tax | INCLUDE </td> 
                            </tr>
                            <tr class="total">
                                <td></td>
                                <td></td>
                                            <td></td>
                                            <td></td>
                                            
                            <td>Shipping Fees | INCLUDE</td> 
                            </tr>
                            <tr class="total">
                                <td></td>
                                <td></td>
                                            <td></td>
                                            <td></td>
                                            
                            <td>Total | <?php echo $t; ?></td> 
                            </tr>
                        <?php } ?>
                    </table> 
                </div>
        </div>
    </div>
</body>
