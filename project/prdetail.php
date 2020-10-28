<?php
require "navbar.php";
require_once "server.php";

$po_id = $_GET['id'];
$userQuery = "SELECT * FROM `pr detail` p inner join product d ON p.product_id = d.product_id where pr_id = '$po_id'";
$result = mysqli_query($conn,$userQuery);
$Query = "SELECT SUM(product_net) AS Total FROM `pr detail` WHERE pr_id = '$po_id'";
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
                    <H1>Purchase Requisition No : PR# <?php echo $po_id?></H1>

                <div class="PO">
                  <table width="500" border="0">
                      <tr>
                          <th width="1000">Product name</th>
                          <th width="500">Description</th>
                        
                          <th width="246">Quantity</th>
                        
                          <th width="246">Delete</th>
                      </tr>
                      <div class="POdetail">
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>     
                 <tr>
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                       
                        <?php echo "<td>".$row['qty']."</td>" ?>
                       
                        <?php echo "<td><a href=\"prdetail_delete.php?id=".$row['pr_detail_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
                    
                 </tr>
                 <?php  } ?>
             </table> 
                <br><br>
            <table>
            
                <td><h3><a href="pr.php">Back To Purchase Requisition <span class="fas fa-arrow-left"></a></h3></td> 
                <?php echo "<td><h3><a href=\"prdetail_create.php?id=".$po_id."\">Add Product " ?> 
                <span class="fas fa-file-medical"></a></h3></td>
            </table>
             </div>
             </div>
                 </form> 
                </body>