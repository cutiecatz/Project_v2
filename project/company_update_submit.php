<?php
require_once "server.php";

$com_id = $_GET['id'];
$code =$_POST['code'];
$name = $_POST['name'];
$comadd = $_POST['comadd'];
$post = $_POST['com_post'];
$city = $_POST['com_city'];
$coun = $_POST['com_coun'];
$tele = $_POST['tele'];
$email = $_POST['email'];


$userQuery = "UPDATE company SET company_code = '$code',
                                 company_name = '$name',
                                 company_address = '$comadd',
                                 company_city = '$city',
                                 company_country = '$coun',
                                 company_post = '$post',
                                 company_phone = '$tele',
                                 company_email = '$email'
                             WHERE company_id = $com_id";
                                 
$result = mysqli_query($conn,$userQuery);
if(!$result){
    die("Could not succesfully run the query $userQuery ".mysqli_error($conn));
}
else{
    echo "Successfully updated the News <br><br>";
    header("location: company.php");
   

}
?>