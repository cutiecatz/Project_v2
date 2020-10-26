<?php
require("server.php");
$userQuery2 = "SELECT * FROM rfq";
$result2 = mysqli_query($conn,$userQuery2);
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

<h1 class="head">Add Purchase Order</h1>
<div class="container">
  <form action="po_add.php" method="POST">

    <label for="id">Purchase Order ID</label>
    <input type="text" name="po_id" placeholder="your id...">

    <label for="ccode">RFQ ID</label>
    <select name="c" id="c">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['rfq_id']; ?>"> <?php echo $row['rfq_id']; ?> </option>
     <?php } ?> </select>
    
    <label for="pdate">Purchase Order Date </label><br><br>
    <input type="date" name="date">
    <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>