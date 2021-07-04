<?php
        include 'connection.php';
        $first_name = $_POST['firstname'];  
        $last_name = $_POST['lastname'];
        $user_name = $_POST['username'];
        $user_role = $_POST['userrole'];
        $password = $_POST['password'];

        $sql = "select * from user where username ='{$user_name}' ";
        $res = mysqli_query($conn,$sql);
        $query = "insert into user(first_name,last_name,username,password,role)
        values('{$first_name}','{$last_name}','{$user_name}','{$password}','{$user_role}')";
        if(mysqli_num_rows($res)>0)
        {
            echo "<h1>User already exits please chose another name</h1>";
        }
        else
        {
            if(mysqli_query($conn,$query))
            {
                header('location:user.php');
            }
            else
            {
                echo "Query Failed";
            }
        }
        ?>