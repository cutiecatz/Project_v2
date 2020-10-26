<?php
require_once "server.php";
$id = $_POST['id'];
$c = $_POST['c'];
$r = $_POST['r'];
$d = $_POST['date'];
$vat = 7;

$userQuery = "SELECT * FROM inquiry join customer USING (customer_id) WHERE inquiry_id ='$r'";
$result = mysqli_query($conn,$userQuery);
while ($row = mysqli_fetch_assoc($result)) {
    $num = $row['customer_Type'];
}
   
    if ($num == 1){
        $dismat = 5;
        $dis = 0;
        $netdis = 0;
    }
    if($num == 2){
        $dismat = 5;
        $dis = 0;
        $netdis = 10;
    }
    if ($num == 3){
        $dismat = 5;
        $dis = 10;
        $netdis = 10;
    }

echo $num;
$id2= $id+5000;
$userQuery = "INSERT INTO `quotation`(`quo_id`, `company_id`, `inquiry_id`, `quo_date`, `VAT`, `member_discount`, `NET_dis`, `material_dis`)
              values('$id2','$c','$r','$d','$vat','$dis','$netdis','$dismat')";
$result = mysqli_query($conn,$userQuery);
if(!$result)
{
    die ("Could not successfully run the query $userQuery ".mysqli_error($conn));
    header("location: quo.php");
}
else
{
    echo "Successfully run the query $userQuery ".mysqli_error($conn);
    header("location: quo.php");
}
