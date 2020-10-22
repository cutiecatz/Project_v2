<?php
require("server.php");
require('navbar.php');
$userQuery = "SELECT * FROM invoice";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="../Project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
      <h2><a href="po_create.php">Create Purchase Order <span class="fas fa-file-medical"></a></h2>
      <h1 class="phead">INVOCIE</h1>
      <div class="PO">
        <table style="width:90%">
          <tr>
              <th> INVOICE Number</th>
              <th> Vendor </th>
              <th> Company Code</th>
              <th> Purchase Order Date </th>
              <th> View</th>
              <th> Show Document</th>
              <th> Delete</th>
          </tr>
        <div class="POdetail">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
              <?php echo "<td>".$row['po_id']."</td>" ?>
              <?php echo "<td>".$row['vendor_name']."</td>" ?>
              <?php echo "<td>".$row['company_code']."</td>" ?>
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