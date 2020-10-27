<?php
require("server.php");
$rfq_id  = $_GET['id'];
$userQuery = "SELECT * FROM `rfq` 
                        JOIN `purchase requisition`  USING (pr_id)
                        JOIN vendor  USING (vendor_id)
                        JOIN company  USING (company_id)
                        WHERE rfq_id = $rfq_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `rfq detail` 
                            join product USING(product_id) 
                            where rfq_id = '$rfq_id'";
$result2 = mysqli_query($conn,$userQuery2);
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
                        <h1>RFQ</h1>
                        RFQ#: <?php echo $rfq_id;?><br>
                    </div>
                </header>
                <div class="date">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    RFQ DATE :  <?php echo "".$row['rfq_date']."" ?><br>
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
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result2)) { ?> 
                            <tr class="item">
                                <?php echo "<td>".$row['product_id']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['qty']."</td>" ?>
                            </tr>
                        <?php } ?>
                </table> 
                </div>
        </div>
    </div>
</body>
