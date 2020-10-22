<?php
require("server.php");
$userQuery = "SELECT * FROM `customer`";
$result = mysqli_query($conn,$userQuery);

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="msd.css">
</head>

<h2> INQUIRY</h2>
<form action="iq_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>INQUIRY ID</td>
    <td><input type="text" name="id"/></td>
</tr>
<tr>
    <td>Customer Name</td>
    <td><select name="cn" id="cn">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['customer_id']; ?>"> <?php echo $row['customer_name'];?> </option>
     <?php } ?>
    </td>
</tr>
<tr>
    <td>Date </td>
    <td><input type="date" name="date"></td>
</tr>
<tr>
    <td>Due-Date </td>
    <td><input type="date" name="due_date"></td>
</tr>

<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>