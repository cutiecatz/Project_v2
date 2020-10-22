<?php
require("server.php");
$userQuery = "SELECT * FROM customer";
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

<h2>Add Purchase Requisition</h2>
<form action="pr_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Purchase Requisition ID</td>
    <td><input type="text" name="pr_id"/></td>
</tr>
<td>Company Code</td>
    <td><select name="com" id="com">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php $i=1; echo "$c"; ?>"> <?php echo $row['company_code']; $c+=$c?> </option>
     <?php } ?>
    </td>
<tr>
    <td>Purchase Requisition Date </td>
    <td><input type="date" name="date"></td>
</tr>
<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>