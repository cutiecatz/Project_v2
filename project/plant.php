<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `plant`";
$result = mysqli_query($conn,$userQuery);
?>

<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="plant_create.php">Create PLANT <span class="fas fa-industry"></a></h2>
      <h1 class="phead">PLANT</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> PLANT NAME</th>
            <th> Edit</th>
            <th> Delete</th>
            
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>".$row['plant_name']."</td>" ?>
            <?php echo "<td><a href=\"store.php?id=".$row['plant_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"plant_delete.php?id=".$row['plant_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            <br>
          </tr>
          <?php }?>
      </div>
      </div>