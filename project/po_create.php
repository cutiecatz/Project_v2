<?php
require("server.php");
$userQuery = "SELECT * FROM vendor v";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM company";
$result2 = mysqli_query($conn,$userQuery2);
$i=1;
$c=1;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="msd.css">
</head>

<h2>Add Purchase Order</h2>
<form action="po_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Purchase Order ID</td>
    <td><input type="text" name="po_id" placeholder="100"/></td>
</tr>
<tr>
    <td>Vendor</td>
    <td><select name="v" id="v">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo "$i"; ?>"> <?php echo $row['vendor_name']; $i=$i+1;?> </option>
     <?php  } ?>
    </td>
</tr>
<td>Company Code</td>
    <td><select name="c" id="c">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php $i=1; echo "$c"; ?>"> <?php echo $row['company_code']; $c = $c+1;?> </option>
     <?php } ?>
    </td>
<tr>
    <td>Purchase Order Date </td>
    <td><input type="date" name="date"></td>
</tr>



<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>