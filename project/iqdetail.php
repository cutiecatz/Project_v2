<?php
require "navbar.php";
require_once "server.php";

$pr_id = $_GET['id'];
$userQuery = "SELECT * FROM `Inquiry detail` join product USING (product_id) where inquiry_id = '$pr_id'";
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
                <H1>INQUIRY NO : #<?php echo $pr_id?></H1>
                    <table>
                   <td><h3><a href="iq.php">Back To INQUIRY <span class="fas fa-arrow-left"></a></h3></td> 
                   <?php echo "<td><h3><a href=\"iqdetail_create.php?id=".$pr_id."\">Add Product " ?> 
                   <span class="fas fa-plus"></a></h3></td>
                  <table width="416" border="0">
                      <tr>
                          <td width="400">Product name</td>
                          <td width="246">Description</td>
                          <td width="246">Quantity</td>
                          <td width="246">Delete</td>
                         
                      </tr>
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>     
                 <tr>
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                        <?php echo "<td>".$row['product_qty']."</td>" ?>
                        <?php echo "<td><a href=\"iqdetail_delete.php?id=".$row['inquiry_detail_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
                        
                    
                 </tr>
                 <?php  } ?>
             </table> 
                 </form> 
                </body>