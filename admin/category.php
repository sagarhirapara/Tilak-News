<?php
include "connection.php";
include 'checkLoged.php';
include 'checkAdmin.php';
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
    include 'header.php';
    ?>
    <nav class="navbar post_detail">
        <div class="container-fluid">
            <a class="navbar-brand post_d_a">All Category details</a>
        </div>
    </nav>
    <div class="container p-0 pt-2">
        <a class="btn btn-dark " href="addCategory.php">Add Category</a>
    </div>

    <div class="container p-0 detail">
        <table class="table table-dark table-striped mt-4" style="border-radius:10px;">
            <thead>
                <tr>
                    <th scope="col">SR NO</th>
                    <th scope="col">Category Id</th>
                    <th scope="col">Category name</th>
                    <th scope="col">No. of Post</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
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
                    $query = "select * from category limit {$offset},{$limit}";
                
                $result = mysqli_query($conn,$query) or die("query failed");
                mysqli_num_rows($result);
                if(mysqli_num_rows($result)>0){
                    while($x = mysqli_fetch_assoc($result)){
                        ?>
                    <th scope="row"><?php echo $sr;$sr++?></th>
                    <td><?php echo $x['category_id'] ?></td>
                    <td><?php echo $x['category_name'] ?></td>
                    <td><?php echo $x['post'] ?></td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-primary ml-2"
                                href="EditCategory.php?catid=<?php echo $x['category_id']?>&cat=<?php echo $x['category_name']?>">Edit</a>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">

            <?php
                if($page >1){
                    ?>
            <li class="page-item ">
                <a class="page-link" href="category.php?page=<?php echo $page-1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
                }
                ?>

            <?php
                   
                    $sql = "select * from category";
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
                    href="category.php?page=<?php echo $i ?>"><?php echo $i; ?></a>
            </li>


            <?php
            }
        ?>
            <?php 
            if($page < $total_page){
                ?>
            <li class="page-item">
                <a class="page-link" href="category.php?page=<?php echo $page+1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
            <?php
            }
        ?>

        </ul>
    </nav>

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