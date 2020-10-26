<?php
require "navbar.php";
require_once "server.php";

$rfq_id = $_GET['id'];
$userQuery = "SELECT * FROM `RFQ`
                                    JOIN `purchase requisition` USING (pr_id)
                                    JOIN `pr detail` USING (pr_id)
                                    JOIN product USING (product_id)
                                    where rfq_id = '$rfq_id'";
$result = mysqli_query($conn,$userQuery);
$Query = "SELECT SUM(product_net) AS Total FROM `rfq detail` WHERE rfq_id = '$rfq_id'";
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
                    <H1>RFQ Detail : <?php echo $rfq_id ?></H1>
                  <table width="416" border="0">
                      <tr>
                          <td width="400">Product name</td>
                          <td width="246">Description</td>
                          <td width="246">Price</td>
                          <td width="246">Quantity</td>
                          <td width="246">Net</td>
                          
                      </tr>
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>     
                 <tr>
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                        <?php echo "<td>".$row['product_price']."</td>" ?>
                        <?php echo "<td>".$row['qty']."</td>" ?>
                        <?php echo "<td>".$row['product_net']."</td>" ?>
                    
                 </tr>
                 <?php  } ?>
             </table>
            <table>
                    <td><H3>Total Price: <?php while ($row = mysqli_fetch_assoc($re2)) echo $row['Total'] ?></H3></td>
                   <td><h3><a href="rfq.php">Back To RFQ <span class="fas fa-arrow-left"></a></h3></td> 
                   <?php echo "<td><h3><a href=\"rfqdetail_create.php?id=".$rfq_id."\">Post" ?> 
                   <span class="fas fa-plus"></a></h3></td>
            </table>
                 </form> 
                </body>
