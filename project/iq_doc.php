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
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../project/css/doc.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <div class="document">
                <div class="inv-title">
                    <h1>Inquiry</h1>
                </div>
                <!--------------- ------------->
                <div class = "inv-header">
                    Inquiry#: <?php echo $inquiry_id;?><br>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        
                    <div class="customer">
                        <div>
                            <h2><p class="Address-Heading">From : </p></h2>
                            <ul>
                                <li>Customer Name:  <?php echo "".$row['customer_name']."" ?></li>
                                <li>Address: <?php echo "".$row['customer_bill']."" ?>
                                    <?php echo "".$row['customer_bill_city']." ".$row['customer_bill_zipcode']."" ?></li>
                                <li>E-mail: <?php echo "".$row['customer_email']."" ?></li>
                                <li>Phone : <?php echo "".$row['customer_phone']."" ?></li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <th> DATE : </th> 
                                <td><?php echo "".$row['inquiry_date']."" ?><br></td>
                            </tr>
                            <tr>
                                <th> Due DATE : </th> 
                                <td> <?php echo "".$row['inquiry_due_date']."" ?></td>
                            </tr>
                            <?php }?>
                        </table>
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
                                <?php echo "<td>".$row['product_qty']."</td>" ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table> 
                </div>
        </div>
    </div>
</body>