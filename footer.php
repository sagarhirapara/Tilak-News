<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="footerstyle.css">
</head>

<body>


    <!--footer starts from here-->
    <footer class="footer" id="footer">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">
                        Saurashtra patel kelavani mandal,<br>
                        Gulbai tekara,<br>
                        Near C G Road,<br>
                        Ahmedabad-360008
                    </p>

                    <p><i class="fa fa-phone"></i> +91- 9825035725 </p>
                    <p><i class="fa fa fa-envelope"></i> hiraparasagar3@gmail.com </p>


                </div>


                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Category</h5>
                    <!--headin5_amrc-->
                    <ul class="footer_ul_amrc">
                        <?php
                    include "connection.php";
                    $query = "select * from category";
                    $result = mysqli_query($conn,$query);
                    $num = mysqli_num_rows($result);
                    $i = 1;
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                        <li><a
                                href="category.php?cid=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a>
                        </li>
                        <?php } } ?>
                    </ul>
                    <!--footer_ul_amrc ends here-->
                </div>



                <div class=" col-sm-4 col-md  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
                    <!--headin5_amrc ends here-->

                    <ul class="footer_ul2_amrc">
                        <li><a href="https://www.instagram.com/sagar_hirapara02?r=nametag"><i
                                    class="fab fa-instagram"></i></a>
                            <p>Follow us on instagram<a
                                    href="https://www.instagram.com/sagar_hirapara02?r=nametag">https://www.instagram.com/sagar_hirapara02?r=nametag</a>
                            </p>
                        </li>
                        <li><a href="https://www.facebook.com/sagar.hirapara.33"><i class="fab fa-facebook"></i> </a>
                            <p>Follow us on facebook<a
                                    href="https://www.facebook.com/sagar.hirapara.33">https://www.facebook.com/sagar.hirapara.33</a>
                            </p>
                        </li>
                        <li><a href="https://www.linkedin.com/in/sagar-hirapara-9b6044193"><i
                                    class="fab fa-linkedin"></i> </a>
                            <p>Follow us on linkedin<a
                                    href="https://www.linkedin.com/in/sagar-hirapara-9b6044193">https://www.linkedin.com/in/sagar-hirapara-9b6044193</a>
                            </p>
                        </li>
                    </ul>
                    <!--footer_ul2_amrc ends here-->
                </div>
            </div>
        </div>


        <div class="container">
            <ul class="foote_bottom_ul_amrc">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <!--foote_bottom_ul_amrc ends here-->
            <p class="text-center">Copyright @2017 | Designed With by <strong>Swaminaryan news</strong></p>

            <ul class="social_footer_ul">
                <li><a href="https://www.facebook.com/sagar.hirapara.33"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.linkedin.com/in/sagar-hirapara-9b6044193"><i class="fab fa-linkedin"></i></a>
                </li>
                <li><a href="https://www.instagram.com/sagar_hirapara02?r=nametag"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
            <!--social_footer_ul ends here-->
        </div>

    </footer>


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