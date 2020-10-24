<?php
require("server.php");
require('navbar.php');
$userQuery = "SELECT * FROM `product` ORDER BY product_id ";
$result = mysqli_query($conn,$userQuery);

?>

<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="product_create.php"><button class="button button1">Add Product</button></a></h2>
      <h1 class="phead">Product</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
          <th> Product ID</th>
          <th> Product Name</th>
          <th> Product Description</th>
          <th> Weight</th>
          <th> Edit </th>
          <th> Delete </th> 
      </tr>
      <div class="detail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>".$row['product_id']."</td>" ?>
            <?php echo "<td>".$row['product_name']."</td>" ?>
            <?php echo "<td>".$row['product_descrip']."</td>" ?>
            <?php echo "<td>".$row['product_weight']."Kg.</td>" ?>
            <?php echo "<td><a href=\"product_update.php?id=".$row['product_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"product_delete.php?id=".$row['product_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
            </tr>
          <?php }?>
      </div>
      </div>