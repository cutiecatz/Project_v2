<?php

require_once "server.php";
require "navbar.php";
$cus_id = $_GET['id'];
$userQuery = "SELECT * from product where product_id = '$cus_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery".mysqli_error($conn));
}
else
{
    echo "Update Customer<br><br>";
    
    $row=mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)) :?>
        <!DOCTYPE html>
        <html>
                <head>
                    <meta charset="utf-8">
                    <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
                    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <body>
                 <form name="form1" method="post" action="product_update_submit.php?id=<?php echo $cus_id;?>">   
                  <table width="416" border="0">
                      <tr>
                          <td>Product Name</td>
                          <td><textarea rows="5" cols="100" type="text" name="name"><?php echo $row['product_name'];?></textarea></td>

                      </tr>
                      <tr>
                          <td>Description</td>
                          <td><textarea rows="5" cols="100" type="text" name="desc"><?php echo $row['product_descrip'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>Weight</td>
                          <td><textarea rows="5" cols="100" type="text" name="weight"><?php echo $row['product_weight'];?></textarea></td>

                      </tr>
                 
                      <tr>
                          <td ><input type="submit" name="button" value="Submit"></td>
                          
                          <td><input type="reset" name="button2" value="Cancel"></td>
                      </tr>
             </table> 
                 </form> 
                </body>
        <?PHP endwhile ?>

<?php } ?>