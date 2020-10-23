<?php
require("server.php");
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/project_v2/project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Add Customer</h1>
<div class="container">
<form action="customer_add.php">

    <label for="cname">Customer Name </td>
    <input type="text" name="cus_name" placeholder="your customer name...">
<tr>
    <th>Address to Bill</th>
    <td><input type="text" name="add_bill" placeholder="your address to bill..."></td>
    <td> City </td>
    <td><input type="text" name="add_bill_c" placeholder="your city..."></td>
    <td> Zipcode </td>
    <td><input type="text" name="add_bill_z" placeholder="your zipcode..."></td>
    <td> Country </td>
    <td><input type="text" name="add_ship_coun" placeholder="your country..."></td>

    <th>Address to Ship </th>
    <td><input type="text" name="add_ship" placeholder="your address to ship..."></td>
    <td> City </td>
    <td><input type="text" name="add_ship_c" placeholder="your city..."></td>
    <td> Zipcode </td>
    <td><input type="text" name="add_ship_z" placeholder="your zipcode..."></td>
    <td> Country </td>
    <td><input type="text" name="add_ship_coun" placeholder="your country..."></td>


    <label for="mail">E-mail</label><br><br>
    <input type="text" name="mail" placeholder="your email...">
    <br><br>
    <label for="phone">Phone</label><br><br>
    <input type="text" name="phone" placeholder="your phone...">

    <label for="type">Type</label>
    <td><select name="type" id="type">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select></td>

    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</form>
</html>