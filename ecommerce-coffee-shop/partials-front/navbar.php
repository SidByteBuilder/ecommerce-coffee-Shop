<?php include('config/constant.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coffee Shop</title>
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
                    <li class="nav-item active"><a href="<?php echo 'http://localhost/coffee/';?>"
                            class="nav-link">Home</a></li>
                    <li class="nav-item "><a href="<?php echo 'http://localhost/coffee/';?>category.php"
                            class="nav-link">Category</a></li>

                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>services.php"
                            class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>blog.php"
                            class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="<?php echo 'http://localhost/coffee/';?>about.php"
                            class="nav-link">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo 'http://localhost/coffee/';?>shop.php"
                            id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item"
                                href="<?php echo 'http://localhost/coffee/';?>shop.php">Products</a>

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