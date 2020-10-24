<?php
require("server.php");
$userQuery = "SELECT * FROM `sale order`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `storage`";
$result2 = mysqli_query($conn,$userQuery2);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">PICKING DOCUMENT</h1>
<div class="container">
  <form action="pick_add.php" method="POST">

    <label for="id">PICKING ID</label>
    <input type="text" name="pick_id" placeholder="your id...">
    
    <label for="id">SALEORDER ID</label>
    <select name="sid" id="sid">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['sale_id']; ?>"> SO#<?php echo $row['sale_id'];?> </option>
     <?php } ?> </select>
     
    <label for="st">Storage Location</label>
    <select name="st" id="st">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['storage_id']; ?>"> <?php echo $row['storage_name'];?> </option>
     <?php } ?> </select>
    
    <label for="pd">Pick Date </label><br><br>
    <input type="date" name="pick_date">
    <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>