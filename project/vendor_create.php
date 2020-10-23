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
  <form action="vendor_add.php">
 
    <label for="id">Vendor ID</label>
    <input type="text" name="id" placeholder="your vendor id...">

    <label for="vname">Vendor Name</label>
    <input type="text" name="id" placeholder="your vendor name...">

    <label for="add">Address</label>
    <input type="text" name="add" placeholder="your address...">

    <label for="city">City</label>
    <input type="text" name="city" placeholder="your city...">

    <label for="pcode">Post Code</label>
    <input type="text" name="post" placeholder="your post code...">

    <label for="phone">Telephone</label>
    <input type="text" name="post" placeholder="your phone number..">

    <label for="email">E-mail</label>
    <input type="text" name="email" placeholder="your e-mail...">

    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>