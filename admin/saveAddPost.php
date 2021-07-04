<?php
include 'connection.php';
session_start();
$title = mysqli_real_escape_string($conn,$_POST['title']);
$description = mysqli_real_escape_string($conn,$_POST['des']);
$category = $_POST['category'];
$date = date("d M Y");
$author = $_SESSION['user_id'];
if(isset($_FILES['image'])){
    $error = array();
    
    $file_name = $_FILES['image']["name"];
    $file_size = $_FILES['image']["size"];
    $temp_name = $_FILES['image']["tmp_name"];
    $type = $_FILES['image']["type"];
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
        move_uploaded_file($temp_name,"images/" . $file_name);
    }
    else{
        print_f($error);
        die();
    }

}

$query = "insert into post(title,description,category,post_date,author,post_img)
values('{$title}','{$description}',{$category},'{$date}',{$author},'{$file_name}')";
$query2 ="update category set post = (post +1) where category_id={$category}";

if(mysqli_query($conn,$query) and mysqli_query($conn,$query2) )
{
    header('location:post.php');
}
?>