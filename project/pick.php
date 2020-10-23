<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `picking` join  `sale order` USING (sale_id) join storage USING (storage_id)";
$result = mysqli_query($conn,$userQuery);

?>
<html>
    <head> 
          <meta charset="utf-8">
          <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      <h2><a href="pick_create.php"><button class="button button1">Create <br> Picking Document</button></a></h2>
      <h1 class="phead">PICKING</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
            <th> PICKING ID</th>
            <th> SALE ORDER ID</th>
            <th> STORAGE LOCATION </th>
            <th> PICK DATE </th>
            <th> View</th>
            <th> Show Document</th>
            <th> Delete</th>
      </tr>
      <div class="POdetail">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <?php echo "<td>PI#".$row['pick_id']."</td>" ?>
            <?php echo "<td>SO#".$row['sale_id']."</td>" ?>
            <?php echo "<td>".$row['storage_name']."</td>" ?>
            <?php echo "<td>".$row['pick_date']."</td>" ?>
            <?php echo "<td><a href=\"pickdetail.php?id=".$row['pick_id']."\"> " ?> 
            <span class="fas fa-edit"></a></td>
            <?php echo "<td><a href=\"pick_doc.php?id=".$row['pick_id']."\"> " ?> 
              <span class="fas fa-file"></a></td>
            <?php echo "<td><a href=\"pick_delete.php?id=".$row['pick_id']."\"> "?>
            <span class="fas fa-trash-alt"></a></td>
            </tr>
          <?php }?>
      </div>
      </div>

      