<?php
require("server.php");
$userQuery = "SELECT * FROM `product`";
$result = mysqli_query($conn,$userQuery);

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Add Product</h1>
<div class="container">
  <form action="product_add.php">

    <label for="id">Product ID</label>
    <input type="text" name="id" placeholder="your product id...">

    <label for="pname">Product Name</label>
    <input type="text" name="name" placeholder="your product name...">
    
    <label for="pname">Description</label>
    <textarea id="des" name="des" placeholder="your description..." style="height:100px"></textarea>

    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>