<?php
require("server.php");
require('navbar.php');
$userQuery = "SELECT * FROM invoice JOIN `sale order` USING (sale_id)
JOIN quotation USING (quo_id)
JOIN inquiry USING (inquiry_id)
                                    JOIN customer  USING (customer_id)";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="invoice_create.php"><button class="button button1">Create INVOICE</button></a></h2>
      <h1 class="phead">Invoice</h1>
      <div class="PO">
        <table style="width:90%">
          <tr>
              <th> Invoice Number</th>
              <th> Customer </th>
              <th> Date </th>
              <th> View</th>
              <th> Show Document</th>
              <th> Delete</th> 
          </tr>
        <div class="POdetail">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
              <?php echo "<td>INVOICE#".$row['invoice_id']."</td>" ?>
              <?php echo "<td>".$row['customer_name']."</td>" ?>
              <?php echo "<td>".$row['invoice_date']."</td>" ?>            
              <?php echo "<td><a href=\"invoice_detail.php?id=".$row['invoice_id']."\"> " ?> 
              <span class="fas fa-eye"></a></td>
              <?php echo "<td><a href=\"invoice_doc.php?id=".$row['invoice_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
              <?php echo "<td><a href=\"invoice_delete.php?id=".$row['invoice_id']."\"> "?>
              <span class="fas fa-trash-alt"></a></td>
              <br>
          </tr>
          <?php }?>
        </div>
        </table>
      </div>