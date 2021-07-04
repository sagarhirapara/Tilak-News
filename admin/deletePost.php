<?php
include 'connection.php';
include 'checkLoged.php';
$que = "select * from post where post_id = {$_GET['post']}";
$result = mysqli_query($conn,$que) or die("delete image query failed");
$x = mysqli_fetch_assoc($result);
unlink("images/".$x['post_img']) or die("image not delete");
$query = "delete from post where post_id = {$_GET['post']}";
$query2 = "update category set post = (post -1 ) where category_id = {$_GET['cat']}";
if(mysqli_query($conn,$query) and mysqli_query($conn,$query2)){
    header("location:post.php");
}
else
{
    die("Query failed");
}
?>