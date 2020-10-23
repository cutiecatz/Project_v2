<?php
require("server.php");
$userQuery = "SELECT * FROM `company`";
$result2 = mysqli_query($conn,$userQuery);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h2>Add Purchase Order</h2>
<form action="plant_add.php" method="POST" style="border:1px solid gray;">

        <table >
<tr>
    <td>Plant ID</td>
    <td><input type="text" name="plant_id" placeholder=""/></td>
</tr>
<tr>
    <td>Company Name</td>
    <td><select name="company_id" id="company_id">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['company_id']; ?>"> <?php echo $row['company_name'];?> </option>
     <?php } ?>
    </td>
</tr>
<td>Plant Name</td>
    <td><input type="text" name="name" placeholder=""/>
    </td>

<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
    </div>
</table>
</form>
</html>