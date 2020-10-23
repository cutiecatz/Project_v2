<?php
require("server.php");
$userQuery = "SELECT * FROM customer";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM company";
$result2 = mysqli_query($conn,$userQuery2);
$i=1;
$c=1;
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/project_v2/project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Add Purchase Requisition</h1>
<div class="container">
  <form action="pr_add.php">

    <label for="id">Purchase Requisition ID</label>
    <input type="text" name="pr_id" placeholder="your id...">
    
    <label for="ccode">Company Code</label>
    <select name="com" id="com">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php $i=1; echo "$c"; ?>"> <?php echo $row['company_code']; $c+=$c?> </option>
    <?php } ?></select>
    <br>
    <label for="date">Purchase Requisition Date</label>
    <br><br>
    <input type="date" name="date" placeholder="your date...">
        <br><br>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>

</form>
</html>