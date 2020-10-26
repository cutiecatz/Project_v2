<?php
require("server.php");
$userQuery = "SELECT * FROM `customer`";
$result = mysqli_query($conn,$userQuery);

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head"> INQUIRY</h2>
<div class="container">
  <form action="iq_add.php" method="POST">

    <label for="id">INQUIRY ID</label>
    <input type="text" name="id" placeholder="your id...">
    <label for="date">Date </label><br><br>
    <input type="date" name="date">
    <br><br>
    <label for="dd">Due-Date </label><br><br>
    <input type="date" name="due_date">
    <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>