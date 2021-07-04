<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Swaminarayan news</title>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script defer src="fontawesome/js/all.js"></script>

    <style>
    .carousel-item {
        height: 70vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    </style>
</head>

<body>
    <?php include "header.php" ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('image/img1.png')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Swaminarayan news</h2>
                    <p class="lead">world best news website</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('image/img2.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Computer Science</h2>
                    <p class="lead">Data will grow with the high percentage</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('image/img3.jpeg')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Artificial intelligence</h2>
                    <p class="lead">Best path to learn artificial intelligence</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <?php
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                else{
                    $page = 1;
                }
                $limit = 5;
                $offset = ($page - 1)* $limit;
                $sr = 1;
                    $query = "select * from post left join category on post.category=category.category_id left join user on post.author= user.user_id where post.category = {$_GET['cid']} order by post_id desc limit {$offset},{$limit}";
                // echo $query;
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
                            style='border-radius:8px;' height='180px' width='100%' alt=""></div>
                </div>
                <div class="col-md-8" style="box-sizing:border-box;">
                    <div class="m-2">
                        <h2><?php echo $x['title']; ?></h2>
                        <i class="fas fa-tags mr-2"></i><?php echo "  " . $x['category_name']; ?>
                        <i class="fas fa-user mr-2 ml-2"></i><?php echo " " . $x['first_name']; ?>
                        <i class="far fa-calendar-alt mr-2 ml-2"></i><?php echo " " . $x['post_date']; ?>

                        <p>
                            <?php echo substr($x['description'],0,200) . "..."; ?>
                        </p>
                        <div class="d-flex justify-content-end"><a class="btn btn-secondary btn-sm"
                                href="single.php?pid=<?php echo $x['post_id']; ?>">Read
                                more</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <?php
                    }
                }
                else
                {
                    echo "<h2 style='text-align:center;color:white;'>NO RECORD FOUND</h2>";
                }
                ?>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">

            <?php
                if($page >1){
                    ?>
            <li class="page-item ">
                <a class="page-link" href="category.php?page=<?php echo $page-1 ?>&cid=<?php echo $_GET['cid']; ?>"
                    aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
                }
                ?>
            <?php
                   
                    $sql = "select * from post where category = {$_GET['cid']}";
                    $res = mysqli_query($conn,$sql);
                    $record = mysqli_num_rows($res);

                        
            $total_page = ceil($record / 5);
            for($i = 1;$i<=$total_page;$i++)
            {
                if($i == $page)
                {
                    $active = 'active';
                }
                else
                {
                    $active = "";
                }
                ?>

            </li>
            <li class="page-item <?php echo $active ?>"><a class="page-link"
                    href="category.php?page=<?php echo $i ?>&cid=<?php echo $_GET['cid']; ?>"><?php echo $i; ?></a>
            </li>


            <?php
            }
        ?>
            <?php 
            if($page < $total_page){
                ?>
            <li class="page-item">
                <a class="page-link" href="category.php?page=<?php echo $page+1 ?>&cid=<?php echo $_GET['cid']; ?>"
                    aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
            <?php
            }
        ?>

        </ul>
    </nav>




    <?php 
include 'footer.php';
?>

</body>

</html>