<?php
include 'connection.php';
include 'checkLoged.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
    
    ?>
    <nav class="navbar post_detail">
        <div class="container-fluid">
            <a class="navbar-brand post_d_a">Edit your post here</a>
        </div>
    </nav>
    <div class="container pt-2">
        <?php
    $pid = $_GET['pid'];
    $quer = "select * from post join user on post.author=user.user_id join category on category.category_id=post.category where post_id = {$pid}";
    $res = mysqli_query($conn,$quer) or die("Query failed");
    if(mysqli_num_rows($res) > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
    ?>
        <form action="saveEditPost.php?pid=<?php echo $_GET['pid']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="oldCategory" value="<?php echo $row['category_id']; ?>">
            <div class="form-group">
                <label><strong>Title</strong></label>
                <input type="text" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Enter Title"
                    name="title" required>
            </div>
            <div class="form-group">
                <label for="comment"><strong>Description</strong></label>
                <textarea class="form-control" rows="5" name="des"
                    required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="sel1"><strong>Category</strong></label>
                <select class="form-control" id="sel1" name="category">
                    <option disabled>select category</option>
                    <?php
                    $query = "select * from category";
                    $result = mysqli_query($conn,$query) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        while($x = mysqli_fetch_assoc($result)){
                            if($x['category_id'] == $row['category_id'])
                            {
                                $sel = "selected";
                            }
                            else
                            {
                                $sel = "";
                            }
                            echo "<option value='{$x['category_id']}'"." $sel". " >{$x['category_name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sel1"><strong>Chose image</strong></label>
                <input type="file" name="newImage" class="form-control-file border">
                <img src="images/<?php echo $row['post_img']; ?>" height="150px"></img>
                <input type="hidden" value="<?php echo $row['post_img']; ?>" name="oldImage" id="">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Edit
                    post</button>
            </div>
        </form>
        <?php 
        }
    }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>