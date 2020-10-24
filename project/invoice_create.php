<?php
require("server.php");
$userQuery = "SELECT * FROM customer ";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM company";
$result2 = mysqli_query($conn,$userQuery2);
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
  <form action="invoice_add.php">

    <label for="id">Invoice ID</label>
    <input type="text" name="invoice_id" placeholder="your id...">

    <label for="id">SALE ORDER ID</label>
    <select name="sale" id="sale">
    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        <option value="<?php  echo $row['sale_id'] ?>"> SO#<?php echo $row['sale_id'];?> </option>
     <?php } ?> </select>
   
    <label for="cus">Customer</label>
    <select name="cus" id="cus">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['customer_id'] ?>"> <?php echo $row['customer_name']; ?> </option>
     <?php  } ?> </select>
    
    <label for="ccode">Company Code</label>
    <select name="com" id="com">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php  echo $row['company_id'] ?>"> <?php echo $row['company_code'];?> </option>
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