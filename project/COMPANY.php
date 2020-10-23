<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `company`";
$result = mysqli_query($conn,$userQuery);

?>

<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="company_create.php"><button class="button button1">Add Company Code</button></a></h2>
      <h1 class="phead">Company</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
          <th> Company Code</th>
          <th> Name</th>
          <th> Address</th>
          <th> Telephone</th>
          <th> E-mail</th>
          <th> Edit </th>
          <th> Delete </th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>".$row['company_code']."</td>" ?>
            <?php echo "<td>".$row['company_name']."</td>" ?>
            <?php echo "<td>".$row['company_address']."" ?>
            <?php echo "".$row['company_city']."" ?>
            <?php echo "".$row['company_country']."" ?>
            <?php echo "".$row['company_post']."</td>" ?>
            <?php echo "<td>".$row['company_phone']."</td>" ?>
            <?php echo "<td>".$row['company_email']."</td>" ?>
            <?php echo "<td><a href=\"company_update.php?id=".$row['company_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"company_deleate.php?id=".$row['company_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
          </tr>
          <?php }?>
      </div>
      </div>