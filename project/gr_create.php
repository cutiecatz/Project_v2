<?php
require("server.php");
$userQuery2 = "SELECT * FROM `invoice`";
$result2 = mysqli_query($conn,$userQuery2);
$userQuery3 = "SELECT * FROM `purchase order`";
$result3 = mysqli_query($conn,$userQuery3);
$userQuery4 = "SELECT * FROM `storage`";
$result4 = mysqli_query($conn,$userQuery4);

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">GOODS RECEIPT DOCUMENT</h1>
<div class="container">
  <form action="gr_add.php" method="POST">

    <label for="id">GOODS RECEIPT ID</label>
    <input type="text" name="gr_id" placeholder="your id...">

    <label for="id">PURCHASE ORDER ID</label>
    <select name="po" id="po">
    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        <option value="<?php echo $row['po_id']; ?>"> PO#<?php echo $row['po_id'];?> </option>
     <?php } ?> </select>

     <label for="id">Storage Location</label>
    <select name="sto" id="sto">
    <?php while ($row = mysqli_fetch_assoc($result4)) { ?>
        <option value="<?php echo $row['storage_id']; ?>"> <?php echo $row['storage_name'];?> </option>
     <?php } ?> </select>

    <label for="id">DELIVERY</label>

        <td><select name="type" id="type">
        <option value="TONG SUEN">TONG SUEN</option>
        <option value="FastShip.co">FastShip.co</option>
        <option value="D-ONE Logistics">D-ONE Logistics</option>
        <option value="APM">APM</option>
        <option value="MSC">MSC</option>
        <option value="COSCO">COSCO</option>
    </select></td>
   

    <label for="gd">GOODS RECEIPT DATE </label><br><br>
    <input type="date" name="gr_date">
    <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>