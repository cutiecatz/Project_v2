<?php

require_once "server.php";
$com_id = $_GET['id'];
$userQuery = "SELECT * from company where company_id = '$com_id'";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die("Could not successfully run the query $userQuery".mysqli_error($conn));
}
else
{

    
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
                <h1 class="head">Edit Company</h1>
                <div class="container">
                 <form name="form1" method="post" action="company_update_submit.php?id=<?php echo $com_id;?>">   
                  <table >
                      <tr>
                          <td>Company Code</td>
                          <td><textarea rows="1" cols="100" type="text" name="code"><?php echo $row['company_code'];?></textarea></td>

                      </tr>
                      <tr>
                          <td>Company Name</td>
                          <td><textarea rows="1" cols="100" type="text" name="name"><?php echo $row['company_name'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>Company Address</td>
                          <td><textarea rows="2" cols="30" type="text" name="comadd"><?php echo $row['company_address'];?></textarea></td>
                          <td> City</td>
                          <td><textarea rows="2" cols="20" type="text" name="com_city"><?php echo $row['company_city'];?></textarea></td>
                          <td>Zipcode</td>
                          <td><textarea rows="2" cols="20" type="text" name="com_post"><?php echo $row['company_post'];?></textarea></td>
                          <td>Country</td>
                          <td><textarea rows="2" cols="20" type="text" name="com_coun"><?php echo $row['company_country'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>Telephone</td>
                          <td><textarea rows="1" cols="100" type="text" name="tele"><?php echo $row['company_phone'];?></textarea></td>
                      </tr>
                      <tr>
                          <td>E-mail</td>
                          <td><textarea rows="1" cols="100" type="text" name="email"><?php echo $row['company_email'];?></textarea></td>
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