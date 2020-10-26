<?php
require("server.php");
require('navbar.php');
$userQuery = "SELECT * FROM `employee`";
$result = mysqli_query($conn,$userQuery);

?>


<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="employee_create.php"><button class="button button1">Add Employee</button></a></h2>
      <h1 class="phead">Company</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
          <th> Employee</th>
          <th> Position</th>
          <th> Edit </th>
          <th> Delete </th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>".$row['employee_name']."</td>" ?>
            <?php echo "<td>".$row['employee_position']."</td>" ?>
            
            <?php echo "<td><a href=\"employee_update.php?id=".$row['employee_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"employee_delete.php?id=".$row['employee_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
          </tr>
          <?php }?>
      </div>
      </div>