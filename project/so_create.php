<?php
require("server.php");
$userQuery = "SELECT * FROM `customer`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `employee`";
$result2 = mysqli_query($conn,$userQuery2);
$userQuery4 = "SELECT * FROM `quotation`";
$result4 = mysqli_query($conn,$userQuery4);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head"> SALE ORDER</h1>
<div class="container">
  <form action="so_add.php" method="POST">

    <label for="id">SALE ID</label>
    <input type="text" name="id" placeholder="your id...">
    
     
    <label for="id">QUOTATION ID</label>
    <select name="quo" id="quo">
    <?php while ($row = mysqli_fetch_assoc($result4)) { ?>
        <option value="<?php echo $row['quo_id']; ?>"> <?php echo $row['quo_id'];?> </option>
     <?php } ?> </select>
    
    <label for="em">Employee</label>
    <select name="em" id="em">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['employee_id']; ?>"> <?php echo $row['employee_name'];?> </option>
     <?php } ?> </select>
    <br><br>
    <label for="dd">Due-Date </label><br><br>
    <input type="date" name="due_date">
    <br><br>
    <label for="dev">Delivery Date </label><br><br>
    <input type="date" name="dev_date">
    <br><br>
    <label for="ship">Ship-Method </label>
    <td><select name="ship" id="ship">
        <option value="Air">Air</option>
        <option value="Ground">Ground</option>
        <option value="Sea">Sea</option>
    </select></td>

    <label for="ship">Payment-Term </label>
    <td><select name="pay" id="pay">
        <option value="Credit">Credit</option>
        <option value="Debit">Debit</option>
    </select></td>

    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>