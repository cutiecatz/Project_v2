<?php
require("server.php");
$id = $_GET['id'];
$userQuery = "SELECT * FROM `product`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `storage` WHERE storage_id = '$id'";
$result2 = mysqli_query($conn,$userQuery2); 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="msd.css">
</head>

<h2>STOCK PRODUCT</h2>
<form action="storeproduct_submit.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>STORAGE</td>
    <td><select name="sid" id="sid">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['storage_id']; ?>"> <?php echo $row['storage_name'];?> </option>
     <?php  } ?>
    </td>
</tr>
<tr>
    <td> PRODUCT NAME</td>
    <td><select name="id" id="id">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['product_id']; ?>"> <?php echo $row['product_name'];?> </option>
     <?php  } ?>
    </td>
</tr>
<tr>
<td>QUANTITY</td>
<td><input type="text" name="qty" placeholder=""/></td>
</tr>
<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
    </div>
</table>
</form>
</html>