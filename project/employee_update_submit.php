<?php
require_once "server.php";

$cus_id = $_GET['id'];
$n =$_POST['name'];
$p = $_POST['bill'];



$userQuery = "UPDATE employee SET employee_name = '$n',
                                 employee_position ='$p'
                                
                                 WHERE employee_id = $cus_id";
                                 
$result = mysqli_query($conn,$userQuery);
if(!$result){
    die("Could not succesfully run the query $userQuery ".mysqli_error($conn));
}
else{
    echo "Successfully updated the News <br><br>";
    header("location: employee.php");
   

}
?>