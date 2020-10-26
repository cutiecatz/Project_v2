<?php
require "navbar.php";
require_once "server.php";

$rfq_id = $_GET['id'];
$userQuery = "SELECT * FROM `sale order` join quotation USING (quo_id)  
                    join `quo detail` USING (quo_id)
                    join product USING (product_id)
                    where sale_id = '$rfq_id'";
$result = mysqli_query($conn,$userQuery);
$Query = "SELECT SUM(net) AS Total, SUM(discount) AS Dis FROM `sale detail` WHERE sale_id = '$rfq_id'";
$re2 = mysqli_query($conn,$Query);
$userQuery2 = "SELECT * FROM `sale order` JOIN employee USING (employee_id) WHERE sale_id = '$rfq_id'";
$result3 = mysqli_query($conn,$userQuery2);
?>
        <!DOCTYPE html>
        <html>
        <head> 
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
                <body>
                    <H1>Sale Order Detail : <?php echo $rfq_id ?></H1>

                <br><br>
                  <table width="416" border="0">
                      <tr>
                          <td width="400">Product name</td>
                          <td width="246">Description</td>
                          <td width="246">Unit/Price</td>
                        
                          <td width="246">Quantity</td>
                          <td width="246">Discount</td>
                          <td width="246">Net </td>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>     
                        <tr>
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                        <?php echo "<td>".$row['product_price']."</td>" ?>
                        
                        <?php echo "<td>".$row['qty']."</td>" ?>
                        <?php echo "<td>".$row['product_dis']."</td>" ?>
                        <?php echo "<td>".$row['product_net']."</td>" ?>
                    
                        </tr>
                        <?php  } ?>
                    </table> 
                    <br><br>
                    <table>
                    <tr>
                    <td><H3>Total Price: <?php while ($row = mysqli_fetch_assoc($re2)){ echo $row['Total'] ?></H3></td>
                        <td><h3>Total Discount: <?php echo "".$row['Dis']."" ?></h3></td>
                    <?php }?>
                    <?php while ($row = mysqli_fetch_assoc($result3)){ ?>
                        <td><h3>Sale Person: <?php echo "".$row['employee_name']."" ?></h3></td>
                        <td><h3>Job: <?php echo "".$row['employee_position']."" ?></h3></td>
                        <td><h3>Shipping Method: <?php echo "".$row['ship_method']."" ?></h3></td>
                        <td><h3>Delivery Date: <?php echo "".$row['delivery_date']."" ?></h3></td>
                        <td><h3>Due Date: <?php echo "".$row['sale_due_date']."" ?></h3></td>
                    <?php }?>
                    </tr>
                    
                    </table>
                    <table>
                        <tr>
                        <td><h3><a href="so.php">Back To Sale Order <span class="fas fa-arrow-left"></a></h3></td>
                        <?php echo "<td><h3><a href=\"sodetail_create.php?id=".$rfq_id."\">Post" ?> 
                        <span class="fas fa-plus"></a></h3></td>
                        
                    </tr>
                    </table>
                </form> 
                </body>