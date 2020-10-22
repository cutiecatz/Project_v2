<?php
require("server.php");
$userQuery = "SELECT * FROM `sale order`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `storage`";
$result2 = mysqli_query($conn,$userQuery2);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="msd.css">
</head>

<h2> PICKING</h2>
<form action="pick_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>PICKING ID</td>
    <td><input type="text" name="id"/></td>
</tr>
<tr>
    <td>SALEORDER ID</td>
    <td><select name="sid" id="sid">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['sale_id']; ?>"> SO#<?php echo $row['sale_id'];?> </option>
     <?php } ?>
    </td>
</tr>
<tr>
    <td>Storage Location</td>
    <td><select name="st" id="st">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['storage_id']; ?>"> <?php echo $row['storage_name'];?> </option>
     <?php } ?>
    </td>
</tr>
<tr>
    <td>Pick Date </td>
    <td><input type="date" name="pick_date"></td>
</tr>


<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>