<?php
include "connection.php";
include 'checkLoged.php';
include 'checkAdmin.php';


$frist_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$user_role = $_POST['userrole'];
echo $frist_name;
echo $last_name;
echo $user_role;

$query = "update user set first_name = '{$frist_name}' , last_name = '{$last_name}',role = {$user_role} where user_id = {$_GET['user']}";
mysqli_query($conn,$query) or die("Query failed");
header("location:user.php");
?>