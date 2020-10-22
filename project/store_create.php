<?php
require("server.php");

$userQuery = "SELECT * FROM `plant`";
$result2 = mysqli_query($conn,$userQuery);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="msd.css">
</head>

<h2>Add Storage</h2>
<form action="store_add.php" method="POST" style="border:1px solid gray;">

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
    </div>
</table>
</form>
</html>