<?php
require("server.php");
$userQuery = "SELECT * FROM `company`";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `vendor`";
$result2 = mysqli_query($conn,$userQuery2);
$userQuery3 = "SELECT * FROM `rfq`";
$result3 = mysqli_query($conn,$userQuery3);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/project_v2/project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Create Quotation</h1>
<div class="container">
  <form action="quo_add.php">

    <label for="id">Quotation ID</label>
    <input type="text" name="id" placeholder="your id..." >

    <label for="cname">Company name</label>
    <select name="c" id="c">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['company_id']; ?>"> <?php echo $row['company_name'];?> </option>
     <?php  } ?> </select>
    
    <label for="vname">Vendor name</label>
    <select name="v" id="v">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['vendor_id']; ?>"> <?php echo $row['vendor_name'];?> </option>
     <?php  } ?> </select>
    
    <label for="id">RFQ ID</label>
    <select name="r" id="r">
    <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        <option value="<?php echo $row['rfq_id']; ?>"> RFQ#<?php echo $row['rfq_id'];?> </option>
     <?php  } ?> </select>
    
    <label for="date">Date</label><br><br>
    <input type="date" name="date" >
    <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>