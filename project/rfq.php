<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `RFQ` join company USING (company_id) join vendor USING (vendor_id)";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="rfq_create.php">Create RFQ <span class="fas fa-file-medical"></a></h2>
      <h1 class="phead">Request For Quotation</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> Request For Quotation Number</th>
            <th> Company Code</th>
            <th> Vendor </th>
            <th> Request For Quotation Date </th>
            <th> View</th>
            <th> Show Document</th>
            <th> Delete</th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>RFQ#".$row['rfq_id']."</td>" ?>
            <?php echo "<td>".$row['company_name']."</td>" ?>
            <?php echo "<td>".$row['vendor_name']."</td>" ?>
            <?php echo "<td>".$row['rfq_date']."</td>" ?>
            <?php echo "<td><a href=\"rfqdetail.php?id=".$row['rfq_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"rfq_doc.php?id=".$row['rfq_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
            <?php echo "<td><a href=\"rfq_delete.php?id=".$row['rfq_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            </tr>
          <?php }?>
      </div>
      </div>