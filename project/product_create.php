<?php
require("server.php");
require("navbar.php");
$userQuery = "SELECT * FROM `product`";
$result = mysqli_query($conn,$userQuery);

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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