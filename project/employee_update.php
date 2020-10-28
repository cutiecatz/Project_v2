<?php

require_once "server.php";
$cus_id = $_GET['id'];
$userQuery = "SELECT * from employee where employee_id = '$cus_id'";
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
                <h1 class="head">Edit Employee</h1>
                 <form method="post" action="employee_update_submit.php?id=<?php echo $cus_id;?>">   
                  <table width="416" border="0">
                      <tr>
                          <td>Employee Name</td>
                          <td><textarea rows="2" cols="50" type="text" name="name"><?php echo $row['employee_name'];?></textarea></td>

                      </tr>
                      <tr>
                          <td>Position</td>
                          <td><textarea rows="2" cols="50" type="text" name="bill"><?php echo $row['employee_position'];?></textarea></td>
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