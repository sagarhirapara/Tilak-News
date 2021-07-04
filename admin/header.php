<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <style>
    body {
        background: #A8A2A2;
    }

    .logout {
        margin-left: 350%;
    }

    .log {
        margin-left: 700%;
    }

    @media screen and (max-width: 801px) {
        .logout {
            margin-left: 0px;
        }

        .log {
            margin-left: 0px;
        }
    }

    .post_detail {
        background-color: rgb(105, 96, 96);
        color: white;
    }

    .post_d_a {
        margin-left: auto;
        margin-right: auto;
    }


    @media screen and (max-width:700px) {
        .detail {
            overflow-x: scroll;
        }

    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">swaminarayan news</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="post.php">Post</a>
                    </li>
                    <?php
            if($_SESSION["role"] == 1)
            {
            ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="user.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="category.php">Category</a>
                    </li>
                    <li class="nav-item logout">
                        <a class="nav-link active" href="logout.php">Logout</a>
                    </li>
                    <?php
            }
            else
            {
                ?>
                    <li class="nav-item log">
                        <a class="nav-link active" href="logout.php">Logout</a>
                    </li>
                    <?php
            }
            ?>

                </ul>
            </div>
        </div>
    </nav>

</body>

</html>