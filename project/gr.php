<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `goods receipt` JOIN `purchase order` USING (po_id) JOIN storage USING (storage_id)";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head> 
          <meta charset="utf-8">
          <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="gr_create.php"><button class="button button1">Create <br> Goods Receipt Document</button></a></h2>
      <h1 class="phead">GOODS RECEIPT</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> GOODS RECEIPT ID</th>
            <th> PURCHASE ORDER ID</th>
            <th> Storage Location</th>
            <th> DELIVERED BY </th>
            <th> GOODS RECEIPT DATE </th>
            <th> View</th>
            <th> Show Document</th>
            <th> Delete</th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>GR#".$row['gr_id']."</td>" ?>
            <?php echo "<td>PO#".$row['po_id']."</td>" ?>
            <?php echo "<td>".$row['storage_name']."</td>" ?>
            <?php echo "<td>".$row['delivery']."</td>" ?>
            <?php echo "<td>".$row['gr_date']."</td>" ?>
            <?php echo "<td><a href=\"grdetail.php?id=".$row['gr_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"gr_doc.php?id=".$row['gr_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
            <?php echo "<td><a href=\"gr_delete.php?id=".$row['gr_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            </tr>
          <?php }?>
      </div>
      </div>