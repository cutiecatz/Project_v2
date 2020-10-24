<?php
require("server.php");
$userQuery2 = "SELECT * FROM `invoice`";
$result2 = mysqli_query($conn,$userQuery2);
$userQuery3 = "SELECT * FROM `purchase order`";
$result3 = mysqli_query($conn,$userQuery3);

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

    <label for="id">INVOICE ID</label>
    <select name="in" id="in">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['invoice_id']; ?>"> INVOICE#<?php echo $row['invoice_id'];?> </option>
     <?php } ?> </select>

    <label for="id">PURCHASE ORDER ID</label>
    <select name="po" id="po">
    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        <option value="<?php echo $row['po_id']; ?>"> PO#<?php echo $row['po_id'];?> </option>
     <?php } ?> </select>


    
    <label for="gd">GOODS RECEIPT DATE </label><br><br>
    <input type="date" name="gr_date">
    <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>