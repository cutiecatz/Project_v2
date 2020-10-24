<?php
require_once "server.php";

$rfq_id = $_GET['id'];
$userQuery = "SELECT * FROM `rfq detail` inner join product where rfq_id = '$rfq_id'";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM product ";
$result2 = mysqli_query($conn,$userQuery2);
$i=1;
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<h1 class="head">Add Request For Quotation:<?php echo $rfq_id ?></h2>
<div class="container">
  <form action="rfq_add.php">

    <label for="id">Request For Quotation ID</label>
    <input type="text" name="rfq_id" placeholder="<?php echo $rfq_id ?>">
    
    <label for="name">Product name</label>
    <select name="name" id="name">
    <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $row['product_id']; ?>"> <?php echo $row['product_name']; $i+=$i?> </option>
     <?php  } ?>
    
    <label for="price">Price</label>
    <input type="text" name="price" placeholder="<?php echo $rfq_id ?>">

    <label for="price">Price</label>
    <input type="text" name="price" placeholder="<?php echo $rfq_id ?>">
    
    <label for="qty">Quantity</label>
    <input type="text" name="qty" placeholder="<?php echo $rfq_id ?>">
    
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>