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
                <h1>Request For Quotation</h1>
                <div>
                    RFQ#: <?php echo $rfq_id;?><br>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    RFQ DATE :  <?php echo "".$row['rfq_date']."" ?><br>
                </div>
            </div>
            <div class="inv-header">
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
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result2)) { ?> 
                        <tbody>
                            <tr class="item">
                                <?php echo "<td>".$row['product_id']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['qty']."</td>" ?>
                            </tr>
                        </tbody>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
