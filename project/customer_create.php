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
<form action="customer_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>Customer Name </td>
    <td><input type="text" name="cus_name"></td>
</tr>
<tr>
    <td>Address to Bill</td>
    <td><input type="text" name="add_bill"></td>
    <td> City </td>
    <td><input type="text" name="add_bill_c"></td>
    <td> Zipcode </td>
    <td><input type="text" name="add_bill_z"></td>
    <td> Country </td>
    <td><input type="text" name="add_ship_coun"></td>
</tr>
<tr>
    <td>Address to Ship </td>
    <td><input type="text" name="add_ship"></td>
    <td> City </td>
    <td><input type="text" name="add_ship_c"></td>
    <td> Zipcode </td>
    <td><input type="text" name="add_ship_z"></td>
    <td> Country </td>
    <td><input type="text" name="add_ship_coun"></td>
</tr>
<tr>
    <td>E-mail</td>
    <td><input type="email" name="mail"></td>
</tr>
<tr>
    <td>Phone</td>
    <td><input type="text" name="phone"></td>
</tr>
<tr>
    <td>Type</td>
    <td><select name="type" id="type">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select></td>
</tr>
<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>

<table>
    
</table>
</form>
</html>