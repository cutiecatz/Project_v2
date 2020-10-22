<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `sale order` join employee USING (employee_id) join `customer` USING (customer_id) ";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head> 
          <meta charset="utf-8">
          <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="so_create.php">Create SALE ORDER <span class="fas fa-file-medical"></a></h2>
      <h1 class="phead">SALE ORDER</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> SALE ORDER ID</th>
            <th> CUSTOMER</th>
            <th> EMPLOYEE</th>
            <th> DATE </th>
            <th> View</th>
            <th> Show Document</th>
            <th> Delete</th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>SO#".$row['sale_id']."</td>" ?>
            <?php echo "<td>".$row['customer_name']."</td>" ?>
            <?php echo "<td>".$row['employee_name']."</td>" ?>
            <?php echo "<td>".$row['sale_date']."</td>" ?>
            
            <?php echo "<td><a href=\"sodetail.php?id=".$row['sale_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"so_doc.php?id=".$row['sale_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
            <?php echo "<td><a href=\"so_delete.php?id=".$row['sale_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            </tr>
          <?php }?>
      </div>
      </div>