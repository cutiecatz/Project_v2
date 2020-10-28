<?php
require_once "server.php";
$cus_id = $_GET['id'];
$userQuery = "SELECT * from product where product_id = '$cus_id'";
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
                <h1 class="head">Edit Product</h1>
                <div class="container">
                    <form method="post" action="product_update_submit.php?id=<?php echo $cus_id;?>">   

                            <label for="pname">Product Name</label>
                            <input type="text" name="name" placeholder="your product name...">

                            <label for="pname">Description</label>
                            <textarea id="des" name="des" placeholder="your description..." style="height:100px"></textarea>

                            <label for="pname">Weight</label>
                            <input type="text" name="weight" placeholder="your weight...">

                            <td><input type="submit" name="button" value="Submit"></td>
                            <td><input type="reset" name="button2" value="Reset"></td>
                    </form>
                </div>
                </body>
        <?PHP endwhile ?>

<?php } ?>