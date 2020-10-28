<?php
require "navbar.php";
require_once "server.php";

$pick = $_GET['id'];
$userQuery = "SELECT * FROM picking JOIN `sale order` USING (sale_id)
                                    JOIN `sale detail` USING (sale_id)
                                    JOIN product USING(product_id)
                                    WHERE pick_id = '$pick'";
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
                <H1 style="color: goldenrod;">PICKING NO : #<?php echo $pick?></H1>
                <table width="416" border="0">
                      <tr>
                          <td width="400">Product name</td>
                          <td width="246">Description</td>
                          <td width="246">Quantity</td>
                         
                      </tr>
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>     
                 <tr>
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                        <?php echo "<td>".$row['qty']."</td>" ?>
                 </tr>
                 <?php  } ?>
                </table> 
                <table>
                   <td><h3><a href="pick.php">Back To PICKING <span class="fas fa-arrow-left"></a></h3></td> 
                   <?php echo "<td><h3><a href=\"pick_cutstock.php?id=".$pick."\">POST</a></h3></td>" ?>
                    </table> 
                </form> 
                </body>