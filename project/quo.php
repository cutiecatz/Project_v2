<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `quotation` join company USING (company_id) join vendor USING (vendor_id) join rfq USING(rfq_id)";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="quo_create.php">Create Quotation <span class="fas fa-file-medical"></a></h2>
      <h1 class="phead">Quotation</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> QuotationID</th>
            <th> Company Code</th>
            <th> Vendor </th>
            <th> RFQID </th>
            <th> Date </th>
            <th> View</th>
            <th> Show Document</th>
            <th> Delete</th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>QUO#".$row['quo_id']."</td>" ?>
            <?php echo "<td>".$row['company_name']."</td>" ?>
            <?php echo "<td>".$row['vendor_name']."</td>" ?>
            <?php echo "<td>RFQ#".$row['rfq_id']."</td>" ?>
            <?php echo "<td>".$row['quo_date']."</td>" ?>
            <?php echo "<td><a href=\"quodetail.php?id=".$row['quo_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"quo_doc.php?id=".$row['quo_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
            <?php echo "<td><a href=\"quo_delete.php?id=".$row['quo_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            </tr>
          <?php }?>
      </div>
      </div>