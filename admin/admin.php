<?php
include 'connection.php';
session_start();
if(isset($_SESSION['username']))
{
    header("location:post.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <style>
    body {
        background-color: rgba(96, 86, 105, 0.37);
    }

    .container {
        display: flex;
        height: 100vh;
        justify-content: center;
    }

    label {
        font-size: 20px;
        color: rgba(37, 9, 63, 1);
    }

    .alert-warning {
        display: none;
    }
    </style>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-dark bg-dark">
            <h2 style="color: white">swaminarayan news...</h2>
        </nav>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" id="warr" role="alert">
        <strong>Hello dear </strong> Your password or username is not match ...
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="container">
        <div class="form w-100 col-md-5 pt-5">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" id="myform" method="POST" autocomplete="on">
                <div class="form-group">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter username" name="username" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password" />
                </div>
                <button type="submit" class="btn btn-primary" name="login"
                    style="position: relative; left: 50%; transform: translateX(-50%)" id="submit">
                    Submit
                </button>
            </form>
            <?php
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = $_POST['password'];
        $query = "select * from user where username = '{$username}' and password = '{$password}'";
        $result = mysqli_query($conn,$query) or die("query failed");
        if(mysqli_num_rows($result) >0){
            while($x = mysqli_fetch_assoc($result)){
                $_SESSION['username'] = $x['username'];
                $_SESSION['role'] = $x["role"];
                $_SESSION['user_id'] = $x['user_id'];
                
                // echo  $_SESSION['password'];
                echo  $_SESSION['role'];
                ?>
            <script>
            window.location = "post.php";
            </script>
            <?php
            }
        }
        else
        {
            echo "<h2>Username or password does not match";
        }
    }
    
    ?>
        </div>
    </div>


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