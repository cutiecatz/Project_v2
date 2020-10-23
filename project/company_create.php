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
<form action="company_add.php" method="POST" style="border:1px solid gray;">
<table>
<tr>
    <td>ID </td>
    <td><input type="text" name="company_id"></td>
</tr>
<tr>
    <td>Company Name </td>
    <td><input type="text" name="company_name"></td>
</tr>
<tr>
    <td>Company Code </td>
    <td><input type="text" name="company_code"></td>
</tr>
<tr>
    <td>Address</td>
    <td><input type="text" name="company_add"></td>
</tr>
<tr>
    <td>City</td>
    <td><input type="text" name="company_city"></td>
</tr>
<tr>
    <td>Post Code </td>
    <td><input type="text" name="company_post"></td>
</tr>
<tr>
    <td>Telephone </td>
    <td><input type="text" name="company_phone"></td>
</tr>
<tr>
    <td>E-mail</td>
    <td><input type="email" name="company_mail"></td>
</tr>
<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>