<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `company`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `vendor`";
$result2 = mysqli_query($conn,$userQuery2);
$userQuery3 = "SELECT * FROM `rfq`";
$result3 = mysqli_query($conn,$userQuery3);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
</head>

<h2>Create Quotation</h2>
<form action="quo_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Quotation ID</td>
    <td><input type="text" name="id" ></td>
</tr>
<tr>
    <td>Company name</td>
    <td><select name="c" id="c">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['company_id']; ?>"> <?php echo $row['company_name'];?> </option>
     <?php  } ?>
    </td>
</tr>
<tr>
    <td>Vendor name</td>
    <td><select name="v" id="v">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['vendor_id']; ?>"> <?php echo $row['vendor_name'];?> </option>
     <?php  } ?>
    </td>
</tr>
<tr>
    <td>RFQ ID</td>
    <td><select name="r" id="r">
    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        <option value="<?php echo $row['rfq_id']; ?>"> RFQ#<?php echo $row['rfq_id'];?> </option>
     <?php  } ?>
    </td>
</tr>
<tr>
    <td>Date</td>
    <td><input type="date" name="date" ></td>
</tr>


<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>