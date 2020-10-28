<?php

require_once "server.php";
require "navbar.php";
$cus_id = $_GET['id'];
$userQuery = "SELECT * from vendor where vendor_id = '$cus_id'";
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
                 <form name="form1" method="post" action="vendor_update_submit.php?id=<?php echo $cus_id;?>">   
                  <table width="416" border="0">
                      <tr>
                          <td>Vendor Name</td>
                          <td><textarea rows="5" cols="100" type="text" name="name"><?php echo $row['vendor_name'];?></textarea></td>

                      </tr>
                      <tr>
                          <td>Address</td>
                          <td><textarea rows="5" cols="100" type="text" name="add"><?php echo $row['vendor_address'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>City</td>
                          <td><textarea rows="5" cols="100" type="text" name="city"><?php echo $row['vendor_city'];?></textarea></td>
                      </tr>

                      <tr>
                          <td>Post Code</td>
                          <td><textarea rows="5" cols="100" type="text" name="post"><?php echo $row['vendor_postcode'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>E-mail</td>
                          <td><textarea rows="5" cols="100" type="text" name="mail" ><?php echo $row['vendor_email'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>Phone</td>
                          <td><textarea rows="5" cols="100" type="text" name="phone" ><?php echo $row['vendor_phone'];?></textarea></td>
                      </tr>
        
                      <tr>
                          <td ><input type="submit" name="button" value="Submit"></td>
                          
                          <td><input type="reset" name="button2" value="Reset"></td>
                      </tr>
             </table> 
                 </form> 
                </body>
        <?PHP endwhile ?>

<?php } ?>