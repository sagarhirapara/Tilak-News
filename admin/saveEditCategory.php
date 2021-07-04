<?php
include "connection.php";
include 'checkLoged.php';
include 'checkAdmin.php';
$new_cat = mysqli_real_escape_string($conn,$_POST['category']);
$cat_id =  $_GET['catid'];
$query = "update category set category_name = '{$new_cat}' where category_id = {$cat_id}";
if(mysqli_query($conn,$query))
{
    header("location:category.php");
}
else
{
    echo "Query failed";
}

?>