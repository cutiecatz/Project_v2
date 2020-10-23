<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM customer ";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM company";
$result2 = mysqli_query($conn,$userQuery2);
$i=1;
$c=1;
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h2>Add Invoice</h2>
<form action="invoice_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Invoice ID</td>
    <td><input type="text" name="invoice_id" placeholder="100"/></td>
</tr>
<tr>
    <td>Customer</td>
    <td><select name="cus" id="cus">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo "$i"; ?>"> <?php echo $row['customer_name']; $i=$i+1;?> </option>
     <?php  } ?>
    </td>
</tr>
<td>Company Code</td>
    <td><select name="com" id="com">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php $i=1; echo "$c"; ?>"> <?php echo $row['company_code']; $c = $c+1;?> </option>
     <?php } ?>
    </td>
<tr>
    <td>Invoice Date </td>
    <td><input type="date" name="date"></td>
</tr>



<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>