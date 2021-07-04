<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'header.php'  ?>

    <?php
    $pid = $_GET['pid'];
                $query = "select * from post left join category on post.category=category.category_id left join user on post.author= user.user_id  where post_id = {$pid}";
                
                $result = mysqli_query($conn,$query) or die("query failed");
                
                mysqli_num_rows($result);
                if(mysqli_num_rows($result)>0){
                    while($x = mysqli_fetch_assoc($result)){
                        ?>
    <div class="container mt-3">
        <div class="card text-white bg-dark mb-3" style="">
            <div class="row">
                <div class="col-md-4 pt-2" style="box-sizing:border-box;">
                    <div class="ml-2 mr-2 mb-2"><img src="admin/images/<?php echo $x['post_img']; ?>"
                            style='border-radius:8px;' height='200px' width='100%' alt=""></div>
                </div>
                <div class="col-md-8" style="box-sizing:border-box;">
                    <div class="m-2">
                        <h2><?php echo $x['title']; ?></h2>
                        <i class="fas fa-tags mr-2"></i><?php echo "  " . $x['category_name']; ?>
                        <i class="fas fa-user mr-2 ml-2"></i><?php echo " " . $x['first_name']; ?>
                        <i class="far fa-calendar-alt mr-2 ml-2"></i><?php echo " " . $x['post_date']; ?>

                        <p>
                            <?php echo $x['description']; ?>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <?php
                    }
                }
                ?>

    <?php include 'footer.php' ?>
</body>

</html>