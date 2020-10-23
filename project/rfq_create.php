<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `vendor`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `company`";
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

<h2>Add Request for Quotation</h2>
<form action="rfq_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Request For Quotation ID</td>
    <td><input type="text" name="rfq_id"/></td>
</tr>
<tr>
    <td>Company Name</td>
    <td><select name="company_id" id="company_id">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['company_id']; ?>"> <?php echo $row['company_name']; $i = $i+1;?> </option>
     <?php } ?>
    </td>
</tr>
<tr>
    <td>Request For Quotation Date </td>
    <td><input type="date" name="rfq_date"></td>
</tr>
<tr>
    <td>Vendor  ID</td>
    <td><select name="vendor_id" id="vendor_id">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo "$c"; ?>"> <?php echo $row['vendor_name']; $c = $c+1;?> </option>
     <?php } ?>
    </td>
</tr>
<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>