<?php
require "navbar.php";
require_once "server.php";

$rfq_id = $_GET['id'];
$userQuery = "SELECT * FROM `quo detail` inner join product where quo_id = '$rfq_id'";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM product ";
$result2 = mysqli_query($conn,$userQuery2);
$userQuery3 = "SELECT * FROM `quotation` WHERE quo_id='$rfq_id' ";
$result3 = mysqli_query($conn,$userQuery3);

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h2>Add Quotation:<?php echo $rfq_id ?></h2>
<form action="quodetail_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Quotation ID</td>
    <td><select name="quo_id" id="quo_id">
    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        <option value="<?php echo $row['quo_id']; ?>"> <?php echo $row['quo_id']; ?> </option>
     <?php  } ?>
    </td>
</tr>
<tr>
    <td>Product name</td>
    <td><select name="name" id="name">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['product_id']; ?>"> <?php echo $row['product_name']; ?> </option>
     <?php  } ?>
    </td>
</tr>
<tr>
    <td>Price</td>
    <td><input type="text" name="price" ></td>
</tr>
<tr>
    <td>Quantity</td>
    <td><input type="number" name="qty" ></td>
</tr>

<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>