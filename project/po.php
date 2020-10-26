<?php
require("server.php");
require('navbar.php');
$userQuery = "SELECT * FROM `purchase order` 
                       JOIN  rfq USING (rfq_id) 
                       JOIN `purchase requisition` USING (pr_id)
                       JOIN vendor USING (vendor_id)
                       JOIN company USING (company_id) ORDER BY po_id";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="po_create.php"><button class="button button1">Create Purchase Order</button></a></h2>
      <h1 class="phead">Purchase Order</h1>
      <div class="PO">
        <table style="width:90%">
          <tr>
              <th> Purchase Order Number</th>
              <th> Vendor </th>
              <th> RFQ ID</th>
              <th> Purchase Order Date </th>
              <th> View</th>
              <th> Show Document</th>
              <th> Delete</th> 
          </tr>
        <div class="POdetail">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
              <?php echo "<td>PO#".$row['po_id']."</td>" ?>
              <?php echo "<td>RFQ#".$row['rfq_id']."</td>" ?>
              <?php echo "<td>".$row['vendor_name']."</td>" ?>
              <?php echo "<td>".$row['po_date']."</td>" ?>            
              <?php echo "<td><a href=\"podetail.php?id=".$row['po_id']."\"> " ?> 
              <span class="fas fa-eye"></a></td>
              <?php echo "<td><a href=\"po_doc.php?id=".$row['po_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
              <?php echo "<td><a href=\"po_delete.php?id=".$row['po_id']."\"> "?>
              <span class="fas fa-trash-alt"></a></td>
              <br>
          </tr>
          <?php }?>
        </div>
        </table>
      </div>