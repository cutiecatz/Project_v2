<?php
require("server.php");
$inquiry_id = $_GET['id'];
$userQuery = "SELECT * FROM `inquiry` 
                       JOIN customer  USING (customer_id)
                       WHERE inquiry_id = $inquiry_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `inquiry detail` i inner join product p ON i.product_id = p.product_id where inquiry_id = '$inquiry_id'";
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
                        <h1>Inquiry</h1>
                        Inquiry#: <?php echo $inquiry_id;?><br>
                    </div>
                </header>
                <div class="date">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            DATE :  <?php echo "".$row['inquiry_date']."" ?><br>
                            Due DATE :  <?php echo "".$row['inquiry_due_date']."" ?><br>

                    </div>
                    <!--------------- ------------->
                <div class="customer">
                        <div>
                            <p class="Address-Heading">From : </p>
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
                            <th>Product_ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result2)) { ?> 
                            <tr class="item">
                                <?php echo "<td>".$row['product_id']."</td>" ?>
                                <?php echo "<td>".$row['product_descrip']."</td>" ?>
                                <?php echo "<td>".$row['product_qty']."</td>" ?>
                            </tr>
                        <?php } ?>
                    </table> 
                </div>
        </div>
    </div>
</body>
