<?php
include "connection.php";
include 'checkLoged.php';
include 'checkAdmin.php';
$post = 0;
$category = mysqli_real_escape_string($conn,$_POST['category_name']);

$query = "insert into category (category_name,post)
values('{$category}',{$post})";
if(mysqli_query($conn,$query)){
    header("location:category.php");
}
else
{
    die("Query failed");
}
?>