<?php
require("server.php");
$userQuery3 = "SELECT * FROM `sale order`";
$result3 = mysqli_query($conn,$userQuery3);
$i=1;
$c=1;
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Add Invoice</h1>
<div class="container">
  <form action="invoice_add.php" method="POST">

    <label for="id">Invoice ID</label>
    <input type="text" name="invoice_id" placeholder="your id...">

    <label for="id">SALE ORDER ID</label>
    <select name="sale" id="sale">
    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        <option value="<?php  echo $row['sale_id'] ?>"> SO#<?php echo $row['sale_id'];?> </option>
     <?php } ?> </select>
   
    
    <label for="date">Invoice Date </label><br><br>
    <input type="date" name="date">
    <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>