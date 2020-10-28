<?php
require("server.php");
require('navbar.php');
$userQuery = "SELECT * FROM `customer`";
$result = mysqli_query($conn,$userQuery);

?>

<html>
    <head> 
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="customer_create.php"><button class="button button1">Add Customer</button></a></h2>
      <h1 class="phead">Customer</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
          <th> Customer ID</th>
          <th> Customer Name</th>
          <th> Address to bill</th>
          <th> Address to Ship </th>
          <th> E-mail</th>
          <th> Phone </th>
          <th> Type</th>
          <th> Edit </th>
          <th> Delete </th>
            
      </tr>
      <div class="customer view">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>".$row['customer_id']."</td>" ?>
            <?php echo "<td>".$row['customer_name']."</td>" ?>
            <?php echo "<td>".$row['customer_bill']."" ?>
            <?php echo "".$row['customer_bill_city']."" ?>
            <?php echo ",".$row['customer_bill_country']."" ?>
            <?php echo "".$row['customer_bill_zipcode']."</td>" ?>
            <?php echo "<td>".$row['customer_ship']."" ?>
            <?php echo "".$row['customer_ship_city']."" ?>
            <?php echo ",".$row['customer_ship_country']."" ?>
            <?php echo "".$row['customer_ship_zipcode']."</td>" ?>
            <?php echo "<td>".$row['customer_email']."</td>" ?>
            <?php echo "<td>".$row['customer_phone']."</td>" ?>
            <?php echo "<td>".$row['customer_Type']."</td>" ?>
            <?php echo "<td><a href=\"customer_update.php?id=".$row['customer_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"customer_delete.php?id=".$row['customer_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
            </tr>
          <?php }?>
      </div>
      </table>
      </div>