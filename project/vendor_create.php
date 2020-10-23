<?php
require("server.php");
require("navbar.php");
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h2>Add Customer</h2>
<form action="vendor_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>VendorID </td>
    <td><input type="text" name="id"></td>
</tr>
<tr>
    <td>Vendor Name </td>
    <td><input type="text" name="name"></td>
</tr>
<tr>
    <td>Address</td>
    <td><input type="text" name="add"></td>
</tr>
<tr>
    <td>City</td>
    <td><input type="text" name="city"></td>
</tr>
<tr>
    <td>Post Code</td>
    <td><input type="text" name="post"></td>
</tr>
<tr>
    <td>Telephone</td>
    <td><input type="text" name="phone"></td>
</tr>
<tr>
    <td>E-mail</td>
    <td><input type="email" name="mail"></td>
</tr>
<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>