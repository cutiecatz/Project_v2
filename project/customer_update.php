<?php

require_once "server.php";
$cus_id = $_GET['id'];
$userQuery = "SELECT * from customer where customer_id = '$cus_id'";
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
                    <link rel="stylesheet" type="text/css" href="../project/css/style_v2.css">
                    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <body>
                <div class="container">
                 <form name="form1" method="post" action="customer_update_submit.php?id=<?php echo $cus_id;?>">   
                  <table >
                      <tr>
                          <td>Customer Name</td>
                          <td><textarea rows="2" cols="50" type="text" name="name"><?php echo $row['customer_name'];?></textarea></td>

                      </tr>
                      <tr>
                          <td>Bill Address</td>
                          <td><textarea rows="2" cols="30" type="text" name="bill"><?php echo $row['customer_bill'];?></textarea></td>
                          <td> City</td>
                          <td><textarea rows="2" cols="20" type="text" name="bill_city"><?php echo $row['customer_bill_city'];?></textarea></td>
                          <td>Zipcode</td>
                          <td><textarea rows="2" cols="20" type="text" name="bill_zip"><?php echo $row['customer_bill_zipcode'];?></textarea></td>
                          <td>Country</td>
                          <td><textarea rows="2" cols="20" type="text" name="bill_coun"><?php echo $row['customer_bill_country'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>Ship Address</td>
                          <td><textarea rows="2" cols="30" type="text" name="ship"><?php echo $row['customer_ship'];?></textarea></td>
                          <td> City</td>
                          <td><textarea rows="2" cols="20" type="text" name="ship_city"><?php echo $row['customer_ship_city'];?></textarea></td>
                          <td>Zipcode</td>
                          <td><textarea rows="2" cols="20" type="text" name="ship_zip"><?php echo $row['customer_ship_zipcode'];?></textarea></td>
                          <td>Country</td>
                          <td><textarea rows="2" cols="20" type="text" name="ship_coun"><?php echo $row['customer_ship_country'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>E-mail</td>
                          <td><textarea rows="5" cols="100" type="text" name="mail" ><?php echo $row['customer_email'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>Phone</td>
                          <td><textarea rows="5" cols="100" type="text" name="phone" ><?php echo $row['customer_phone'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>Type</td>
                          <td><select name="type" id="type"><?php echo $row['customer_Type'];?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>        
                        </select></td>
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