<?php
require("server.php");
$userQuery = "SELECT * FROM `company`";
$result2 = mysqli_query($conn,$userQuery);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Add Plant</h1>
<div class="container">
  <form action="plant_add.php">

    <label for="id">Plant ID</label>
    <input type="text" name="plant_id" placeholder="your plant id...">

    <label for="cname">Company Name</label>
    <select name="company_id" id="company_id">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['company_id']; ?>"> <?php echo $row['company_name'];?> </option>
     <?php } ?>
    
    <label for="pnname">Plant Name</label>
    <input type="text" name="name" placeholder="your plant name..."> 

    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

    </div>
</form>
</html>