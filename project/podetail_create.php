<?php
require_once "server.php";
$po_id = $_GET['id'];
$userQuery = "SELECT  FROM `po detail` where po_id = '$po_id'";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM product ";
$result2 = mysqli_query($conn,$userQuery2);
$i=1;
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h2>Add Purchase Order</h2>
<form action="podetail_add.php?id=<?php echo $po_id;?>" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Product name</td>
    <td><select name="name" id="name">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo "$i"; ?>"> <?php echo $row['product_name']; $i=$i+1;?> </option>
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