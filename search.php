<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Swaminarayan news</title>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script defer src="fontawesome/js/all.js"></script>

</head>

<body>
    <?php include "header.php" ?>
    <?php
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                else{
                    $page = 1;
                }
                $search = $_POST['search'];
                $limit = 5;
                $offset = ($page - 1)* $limit;
                $sr = 1;
                    $query = "select * from post left join category on post.category=category.category_id left join user on post.author= user.user_id where post.title like '%{$search}%' or post.description like '%{$search}%' or user.first_name like '%{$search}%' order by post_id DESC limit {$offset},{$limit}";
                
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
                else{
                    echo "<h2 style='text-align:center;color:white;'>NO RECORD FOUND</h2>";
                }
                ?>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">

            <?php
                if($page >1){
                    ?>
            <li class="page-item ">
                <a class="page-link" href="index.php?page=<?php echo $page-1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
                }
                ?>
            <?php
                   
                    $sql = "select * from post left join category on post.category=category.category_id left join user on post.author= user.user_id where post.title like '%{$search}%' or post.description like '%{$search}%' or user.first_name like '%{$search}%'";
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
                    href="index.php?page=<?php echo $i ?>"><?php echo $i; ?></a>
            </li>


            <?php
            }
        ?>
            <?php 
            if($page < $total_page){
                ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $page+1 ?>" aria-label="Next">
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