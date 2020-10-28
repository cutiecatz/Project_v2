<?php
require("server.php");
require("navbar.php");
$pr_id = $_GET['id'];
$userQuery = "SELECT * FROM `plant` join `storage` using (plant_id) where storage_id = '$pr_id'";
$result = mysqli_query($conn,$userQuery);
?>

<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="store_create.php"><button class="button button1">CREATE STORAGE </button></a></h2>
      <h1 class="phead">  STORAGE</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
          <th> STORAGE NAME</th>
          <th> ADD STOCK</th>
          <th> INVENTORY</th>
          <th> Delete</th>
      </tr>
      
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>".$row['storage_name']."</td>" ?>
            <?php echo "<td><a href=\"storeproduct_add.php?id=".$row['storage_id']."\"> " ?> 
            <span class="fas fa-plus"></a></td>
            <?php echo "<td><a href=\"storagedetail.php?id=".$row['storage_id']."\"> " ?> 
            <span class="fas fa-eye"></a></td>
            <?php echo "<td><a href=\"plant_delete.php?id=".$row['storage_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
          </tr>
          <?php }?>
      </div>
      </div>