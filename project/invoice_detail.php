<?php
require "navbar.php";
require_once "server.php";

$invoice_id = $_GET['id'];
$userQuery = "SELECT * FROM invoice JOIN `sale order` USING (sale_id)
                                    JOIN `sale detail` USING (sale_id)
                                    JOIN product USING(product_id)
                                    WHERE invoice_id = '$invoice_id'";
$result = mysqli_query($conn,$userQuery);
$Query = "SELECT SUM(net) AS Total FROM `sale detail` JOIN product USING(product_id)";
$re2 = mysqli_query($conn,$Query);
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
                    <H1>Invoice No : Invoice# <?php echo $invoice_id?></H1>

                <div class="Invoice">
                  <table width="500" border="0">
                      <tr>
                          <th width="1000">Product name</th>
                          <th width="500">Description</th>
                          <th width="346">Price</th>
                          <th width="246">Quantity</th>
                          <th> Discount</th>
                          <th width="246">Net</th>
                          
                      </tr>
                      <div class="invoice_detail">
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>     
                 <tr>
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                        <?php echo "<td>".$row['price']."</td>" ?>
                        <?php echo "<td>".$row['qty']."</td>" ?>
                        <?php echo "<td>".$row['discount']."</td>" ?>
                        <?php echo "<td>".$row['net']."</td>" ?>
                        
                    
                 </tr>
                 <?php  } ?>
             </table> 
                <br><br>
            <table>
                <td><H3>Total Price: <?php while ($row = mysqli_fetch_assoc($re2)) echo $row['Total'] ?></H3></td>
                <td><h3><a href="invoice.php">Back To Invoice <span class="fas fa-arrow-left"></a></h3></td> 
                <?php echo "<td><h3><a href=\"invoice_detail_add.php?id=".$invoice_id."\">POST</a></h3></td>" ?>
                
            </table>
             </div>
             </div>
                 </form> 
                </body>