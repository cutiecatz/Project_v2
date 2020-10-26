<?php
require "navbar.php";
require_once "server.php";

$quo_id = $_GET['id'];
$userQuery = "SELECT * FROM `quo detail` r join product d USING (product_id) where quo_id = '$quo_id'";
$result = mysqli_query($conn,$userQuery);
$Query = "SELECT SUM(product_net) AS sub FROM `quo detail` WHERE quo_id = '$quo_id'";
$re2 = mysqli_query($conn,$Query);
$Query2 = "SELECT * FROM `quotation` WHERE quo_id = '$quo_id'";
$re = mysqli_query($conn,$Query2);
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
                    <H1>Quotation Detail : <?php echo $quo_id ?></H1>

                <table width="416" border="0">
                      <tr>
                          <td width="400">Product name</td>
                          <td width="246">Description</td>
                          <td width="246">Price</td>
                          <td width="246">Quantity</td>
                          <td width="246">Discount</td>
                          <td width="246">Net</td>
                          <td width="246">Delete</td>
                      </tr>
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>     
                 <tr>
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                        <?php echo "<td>".$row['product_price']."</td>" ?>
                        <?php echo "<td>".$row['qty']."</td>" ?>
                        <?php echo "<td>".$row['product_dis']."</td>" ?>
                        <?php echo "<td>".$row['product_net']."</td>" ?>
                        <?php echo "<td><a href=\"quodetail_delete.php?id=".$row['quo_detail_id']."\"> "?>
                        <span class="fas fa-trash-alt"></a></td>
                    
                 </tr>
                 <?php  } ?>
                </table> 
                <table>
                    <td><H3>SUB TOTAL: <?php while ($row = mysqli_fetch_assoc($re2)) echo $row['sub'] ?></H3></td>
                    <td><H3>VAT : <?php while ($row = mysqli_fetch_assoc($re)) echo $row['VAT'] ?> %</H3></td>
                   <td><h3><a href="quo.php">Back To Quotation <span class="fas fa-arrow-left"></a></h3></td> 
                   <?php echo "<td><h3><a href=\"quodetail_create.php?id=".$quo_id."\">Add Product " ?> 
                   <span class="fas fa-plus"></a></h3></td>
                </table>
                </form> 
                </body>

