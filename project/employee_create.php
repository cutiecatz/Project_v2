<?php
require("server.php");
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Add Employee</h1>
<div class="container">
  <form action="employee_add.php" method="POST">


    <label for="cname">Employee Name</label>
    <input type="text" name="name" placeholder="your name...">

    
    <label for="id">Position</label>

        <td><select name="pos" id="pos">
        <option value="Sale Manager">Sale Manage</option>
        <option value="Picking">Picking</option>
    </select></td>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>