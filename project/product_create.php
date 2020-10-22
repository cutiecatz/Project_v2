<?php
require("server.php");
$userQuery = "SELECT * FROM `product`";
$result = mysqli_query($conn,$userQuery);

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="msd.css">
</head>

<h2>Add Product</h2>
<form action="product_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Product ID</td>
    <td><input type="text" name="id"/></td>
</tr>
<tr>
    <td>Product Name</td>
    <td><input type="text" name="name"/></td>
</tr>
<tr>
    <td>Description </td>
    <td><input type="text" name="des"></td>
</tr>
<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>