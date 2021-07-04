<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Swaminarayan news</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body {
        background: gray !important;
    }

    .outer {
        display: none;
    }

    @media screen and (max-width:900px) {
        #inner-search {
            display: none;
        }

        .outer {
            display: block;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Swaminarayan news</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                    include "connection.php";
                    $query = "select * from category";
                    $result = mysqli_query($conn,$query);
                    $num = mysqli_num_rows($result);
                    $i =1;
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                        <a class="dropdown-item"
                            href="category.php?cid=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a>
                        <?php if($num != $i) {
                            echo '<div class="dropdown-divider m-0"></div>';
                            $i++;
                        }?>
                        <?php
                        }
                    }

                    ?>

                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="#footer"><i class="fas fa-address-book mr-2"></i>Contact us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="admin/admin.php"><i class="fas fa-user mr-2"></i>Admin</a>
                </li>
            </ul>
            <div id="inner-search">
                <form action="search.php" class="form-inline my-2 my-lg-0" method="POST">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                        aria-label="Search" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

        </div>
    </nav>
    <div class="outer">
        <form class="form d-flex justify-content-between p-2">
            <input class="form-control mr-2" style="height:80%;margin-top:10px;" type="search" placeholder="Search"
                aria-label="Search">
            <button class="btn btn-outline-success ml-2 my-2 " style="height:80%;" type="submit">Search</button>
        </form>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>