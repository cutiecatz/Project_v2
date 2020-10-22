<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `Purchase Requisition` JOIN company USING (company_id)";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="pr_create.php">Create Purchase Requisition <span class="fas fa-file-medical"></a></h2>
      <h1 class="phead">Purchase Requisition</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> Purchase Requisition Number</th>
            <th> Company Code</th>
            <th> Purchase Requisition Date </th>
            <th> View</th>
            <th> Show Document</th>
            <th> Delete</th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>PR#".$row['pr_id']."</td>" ?>
            <?php echo "<td>".$row['company_name']."</td>" ?>
            <?php echo "<td>".$row['pr_date']."</td>" ?>
            <?php echo "<td><a href=\"prdetail.php?id=".$row['pr_id']."\"> " ?> 
            <span class="fas fa-eye"></a></td>
            <?php echo "<td><a href=\"pr_doc.php?id=".$row['pr_id']."\"> " ?> 
            <span class="fas fa-file"></a></td>
            <?php echo "<td><a href=\"pr_delete.php?id=".$row['pr_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
          </tr>
          <?php }?>
      </div>
      </div>