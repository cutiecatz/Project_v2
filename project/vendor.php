<?php
require("server.php");
require('navbar.php');
$userQuery = "SELECT * FROM `vendor`";
$result = mysqli_query($conn,$userQuery);

?>

<html>
    <head> 
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="vendor_create.php"><button class="button button1">Add Vender</button></a></h2>
      <h1 class="phead">Vendor</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> Vendor ID</th>
            <th> Name</th>
            <th> Address</th>
            <th> Telephone</th>
            <th> E-mail</th>
            <th> Edit </th>
            <th> Delete </th>
            
      </tr>
      <div class="company view">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>".$row['vendor_id']."</td>" ?>
            <?php echo "<td>".$row['vendor_name']."</td>" ?>
            <?php echo "<td>".$row['vendor_address']."\t" ?>
            <?php echo "\t  ".$row['vendor_city']."" ?>
            <?php echo "".$row['vendor_postcode']."</td>" ?>
            <?php echo "<td>".$row['vendor_phone']."</td>" ?>
            <?php echo "<td>".$row['vendor_email']."</td>" ?>
            <?php echo "<td><a href=\"vendor_update.php?id=".$row['vendor_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"vendor_delete.php?id=".$row['vendor_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
            </tr>
          <?php }?>
          </div>
        </table>
      </div>