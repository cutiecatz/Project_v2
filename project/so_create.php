<?php
require("server.php");
$userQuery = "SELECT * FROM `customer`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `employee`";
$result2 = mysqli_query($conn,$userQuery2);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h2> SALE ORDER</h2>
<form action="so_add.php" method="POST" style="border:1px solid gray;">
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
    <td>Employee</td>
    <td><select name="em" id="em">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['employee_id']; ?>"> <?php echo $row['employee_name'];?> </option>
     <?php } ?>
    </td>
</tr>
<tr>
    <td>Date </td>
    <td>CURRENT DATE</td>
</tr>
<tr>
    <td>Due-Date </td>
    <td><input type="date" name="due_date"></td>
</tr>
<tr>
    <td>Delivery Date </td>
    <td><input type="date" name="dev_date"></td>
</tr>
<tr>
    <td>Ship-Method </td>
    <td><select name="ship" id="ship">
        <option value="Air">Air</option>
        <option value="Ground">Ground</option>
        <option value="Sea">Sea</option>
    </select></td>
</tr>

<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>