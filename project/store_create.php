<?php
require("server.php");
$userQuery = "SELECT * FROM `plant`";
$result2 = mysqli_query($conn,$userQuery);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h2 class="head">Add Storage</h2>
<div class="container">
<form action="store_add.php" method="POST">

<table >
<tr>
    <td> ID</td>
    <td><input type="text" name="id" placeholder=""/></td>
</tr>
<tr>
    <td>Plant Name</td>
    <td><select name="p" id="p">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['plant_id']; ?>"> <?php echo $row['plant_name'];?> </option>
     <?php } ?>
    </td>
</tr>
<td>Storeage Name</td>
    <td><input type="text" name="name" placeholder=""/>
    </td>

<tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
    </div></div>
</table>
</form>
</html>