<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `Inquiry` join customer USING (customer_id)";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="iq_create.php">Create INQUIRY <span class="fas fa-file-medical"></a></h2>
      <h1 class="phead">INQUIRY</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> INQUIRYID</th>
            <th> CUSTOMER NAME</th>
            <th> DATE </th>
            <th> DUE-DATE </th>
            <th> View</th>
            <th> Show Document</th>
            <th> Delete</th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>IQ#".$row['inquiry_id']."</td>" ?>
            <?php echo "<td>".$row['customer_name']."</td>" ?>
            <?php echo "<td>".$row['inquiry_date']."</td>" ?>
            <?php echo "<td>".$row['inquiry_due_date']."</td>" ?>
            <?php echo "<td><a href=\"iqdetail.php?id=".$row['inquiry_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"iq_doc.php?id=".$row['inquiry_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
            <?php echo "<td><a href=\"iq_delete.php?id=".$row['inquiry_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            </tr>
          <?php }?>
      </div>
      </div>