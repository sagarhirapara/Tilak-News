<?php
include 'connection.php';
$pid = $_GET['pid'];
$oldCategory = $_POST['oldCategory'];
$newCategory = $_POST['category'];
$oldImage = $_POST['oldImage'];

$title = $_POST['title'];
$des = $_POST['des'];
if(empty($_FILES['newImage']['name']))
{
    $query = "update post set title = '{$title}', description = '{$des}' , category = {$newCategory},post_img = '{$oldImage}' where post_id = {$pid}";
    mysqli_query($conn,$query) or die("empty query failed");
    if($oldCategory != $newCategory){
        $que = "update category set post=(post-1) where category_id = {$oldCategory}";
        $que2 = "update category set post=(post+1) where category_id = {$newCategory}";
        echo $que;

        mysqli_query($conn,$que);
        mysqli_query($conn,$que2);
    }
    header("location:post.php");

}
else
{
    $error = array();
    
    $file_name = $_FILES['newImage']["name"];
    $file_size = $_FILES['newImage']["size"];
    $temp_name = $_FILES['newImage']["tmp_name"];
    $type = $_FILES['newImage']["type"];
    $ext = strtolower(pathinfo($file_name)['extension']);
    $exten = ["jpg",'jpeg','png'];
    if(in_array($ext,$exten) == false){
        $error[] = "please eneter valid extension";
    }
    
    if($file_size>2097152)
    {
        $error[] = "please upload less 2mb file";
    }
    if(empty($error) == true){
        $query = "update post set title = '{$title}', description = '{$des}' , category = {$newCategory},post_img = '{$file_name}' where post_id = {$pid}";
        mysqli_query($conn,$query) or die("empty query failed");
        if($oldCategory != $newCategory){
            $que = "update category set post = post -1 where category_id = {$oldCategory}";
            $que2 = "update category set post = post +1 where category_id = {$newCategory}";

            mysqli_query($conn,$que) or die("query failed");
            mysqli_query($conn,$que2) or die("query failed");
        }
        move_uploaded_file($temp_name,"images/" . $file_name);

        $que = "select * from post where post_id = {$_GET['pid']}";
        $result = mysqli_query($conn,$que) or die("delete image query failed");
        $x = mysqli_fetch_assoc($result);
        unlink("images/".$oldImage) or die("image not delete");
        header("location:post.php");
    }
    else{
        print_r($error);
        die("code failed");
    }

}

?>