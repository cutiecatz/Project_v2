<?php
require "navbar.php";
require_once "server.php";

$pr_id = $_GET['id'];
$userQuery = "SELECT * FROM `pr detail` inner join product where pr_id = '$pr_id'";
$result = mysqli_query($conn,$userQuery);
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
                    <H1>Purchase Requisition No : <?php echo $pr_id?></H1>
                    <h2><?php echo "<td><a href=\"prdetail_create.php?id=".$pr_id."\">Add Product" ?> 
                    <span class="fas fa-plus"></a></td></h2>
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
                 </form> 
                </body>
