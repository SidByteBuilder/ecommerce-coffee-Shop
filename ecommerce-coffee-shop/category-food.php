<?php include('config/constant.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coffee - Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo 'http://localhost/coffee/';?>">Coffee<small>Blend</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item active"><a href="<?php echo 'http://localhost/coffee/';?>category.php"
                            class="nav-link">Category</a></li>
                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>services.php"
                            class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>blog.php"
                            class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>about.php"
                            class="nav-link">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?php echo 'http://localhost/coffee/';?>shop.php">Product</a>


                        </div>
                    </li>
                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>contact.php"
                            class="nav-link">Contact</a></li>
                    <li class="nav-item cart"><a href="<?php echo 'http://localhost/coffee/';?>cart.php"
                            class="nav-link"><span class="icon icon-shopping_cart"></span><span
                                class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <?php

    //Security code if id is not select go to home page
        if(isset($_GET['category_id']))
      {
          $category_id=$_GET['category_id'];

          //get the category title
          $sql="SELECT title FROM tbl_category WHERE id=$category_id";

          //Execute the query
          $res=mysqli_query($conn, $sql);

          $row=mysqli_fetch_assoc($res);
          
          $category_title= $row['title'];

      }
      else{
          header('location:' .SITEURL);
      }
      ?>

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">"<?php echo $category_title ?>"</h1>
                        <p class="breadcrumbs"><span class="mr-2">
                                <form action="<?php echo 'http://localhost/coffee/';?>food-search.php" method="POST">
                                    <input type="search" name="search" placeholder="Search for Food.." required>
                                    <input type="submit" name="submit" value="Search" class="btn btn-primary ">
                                </form>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Category Food</h2>
                </div>

            </div>
        </div>
        <div class="row">

            <?php
                //create SQL QUERY to get food based on selected category
                $sql2="SELECT * FROM tbl_food WHERE category_id =$category_id";
                 $res2=mysqli_query($conn, $sql2);
                 $count2=mysqli_num_rows($res2);

                        if($count2>0)
                        {
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                $id=$row2['id'];
                                $title=$row2['title'];
                                $price=$row2['price'];
                                $description=$row2['description'];
                                $image_name=$row2['image_name'];
                                ?>
            <div class="col-md-3">
                <div class="menu-entry">
                    <?php 
                       if($image_name=="")
                       {
                        echo"<div class='error'>Image not available</div>";
                      }
                      else{
                        ?>

                    <a href="#" class="img"
                        style="background-image: url(<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>);"></a>
                    <?php
                      }
                      ?>

                    <div class="text text-center pt-4">
                        <h3><a href="#"><?php echo $title; ?></a></h3>
                        <p><?php echo $description; ?></p>
                        <p class="price"><span>$<?php echo $price; ?></span></p>
                        <p><a href="<?php echo 'http://localhost/coffee/';?>cart.php?food_id=<?php echo $id ?>"
                                class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>


            <?php
                            }
                        }
                        else{
                            echo"<div class='error'>Food not Available</div>";
                        }
                
                ?>

        </div>
    </section>





    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">About Us</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia
                            and
                            Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Recent Blog</h2>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has
                                        no control
                                        about</a>
                                </h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Sept 15,
                                            2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a>
                                    </div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has
                                        no control
                                        about</a>
                                </h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Sept 15,
                                            2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a>
                                    </div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Services</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Cooked</a></li>
                            <li><a href="#" class="py-2 d-block">Deliver</a></li>
                            <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                            <li><a href="#" class="py-2 d-block">Mixed</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203
                                        Fake St.
                                        Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392
                                            3929
                                            210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>