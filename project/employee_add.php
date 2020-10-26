<?php
require_once "server.php";
$n = $_POST['name'];
$p = $_POST['pos'];

$userQuery ="INSERT INTO `employee`( `employee_name`, `employee_position`) 
            VALUES ('$n','$p')";
            $result = mysqli_query($conn,$userQuery);
            header("location: employee.php");