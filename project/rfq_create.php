<?php
require("server.php");

$userQuery = "SELECT * FROM `vendor`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `company`";
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

<h1 class="head">Add Request for Quotation</h1>
<div class="container">
<form action="rfq_add.php" method="POST">

    <label for="id">Request For Quotation ID</label>
    <input type="text" name="rfq_id" placeholder="your id...">

    <label for="name">Company Name</label>
    <select name="company_id" id="company_id">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['company_id']; ?>"> <?php echo $row['company_name']; $i = $i+1;?> </option>
     <?php } ?> </select>
    
    <label for="date">Date</label><br><br>
    <input type="date" name="date" placeholder="your date...">
    <br><br>
    <label for="vid">Vendor  ID</label>
    <select name="vendor_id" id="vendor_id">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo "$c"; ?>"> <?php echo $row['vendor_name']; $c = $c+1;?> </option>
     <?php } ?> </select>
    
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>