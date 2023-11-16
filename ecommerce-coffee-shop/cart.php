<?php include('partials-front/navbar.php') ?>
<link rel="stylesheet" href="css/main.css">
<?php
//check food id is set or not
 {
    if(isset($_GET['food_id']))
    {
        //get food id and detail of the selected food
        $food_id =$_GET['food_id'];

        //get the details from the selected food
        $sql="SELECT * FROM tbl_food WHERE id=$food_id";

        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);

        if($count==1)
        {
                 $row=mysqli_fetch_assoc($res);
                
            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];
        }
        else{
            header('location:' .SITEURL);
        }
    }
    else{
        header('location:' .SITEURL);
    }
}
?>
<?php 
        //check submit button is click or not
        if(isset($_POST['submit']))
        {
             $food=$_POST['food'];
             $price=$_POST['price'];
             $qty=$_POST['qty'];
             $total=$price * $qty; //totaly=price x quantity
             $order_date=date("Y-m-d h:i:sa"); //year-month-date hour:minute:second order date
             $status="ordered"; // three different status order, on deliver, cancel
             $customer_name=$_POST['full-name'];
             $customer_contact=$_POST['contact'];
             $customer_email=$_POST['email'];
             $customer_address=$_POST['address'];

             //save the order in databse
             $sql2= "INSERT INTO tbl_order SET
             food='$food',
             price=$price,
             qty=$qty,
             total=$total,
             order_date='$order_date',
             status='$status',
             customer_name='$customer_name',
             customer_contact='$customer_contact',
             customer_email='$customer_email',
             customer_address='$customer_address'
             ";
             $res2=mysqli_query($conn, $sql2);

            if($res2==true)
            {
                 $_SESSION['order'] ="<div class='success text-center'>Food Order successfully</div>";
                 header("location: http://localhost/coffee/checkout.php");
                 
            }
            else{
                $_SESSION['order'] ="<div class='error text-center'>Failed to order food</div>";
                header('location:' .SITEURL. 'checkout.php');
               
            }
        }
        
        ?>
<!-- END nav -->
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Cart</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Cart</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section><!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
        <form action="" method="POST" class="order">
            <fieldset>
                <legend class="text-center">Selected Food</legend>

                <div class="food-menu-img">

                    <?php 
                       if($image_name=="")
                       {
                        echo"<div class='error'>Image not available</div>";
                      }
                      else{
                      ?>
                    <img src="<?php echo 'http://localhost/coffee/';?>images/food/<?php echo $image_name;?>" alt="Pizza"
                        class="img-responsive img-curve">
                    <?php
                    }
                      ?>
                </div>
                <div class="food-menu-desc">
                    <h3><?php echo $title ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">$<?php echo $price?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>


                </div>
            </fieldset>
            <fieldset>
                <legend class="text-center">Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Sidra Kubra" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@sidrakubra.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive"
                    required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>


        </form>


    </div>
</section>

<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p>Far far away, behind the word mountains, far from the countries
                        Vokalia and
                        Consonantia,
                        there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                        </li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                        </li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing
                                    has no
                                    control about</a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept
                                        15,
                                        2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a>
                                </div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing
                                    has no
                                    control about</a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept
                                        15,
                                        2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a>
                                </div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a>
                                </div>
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
                                    Fake St. Mountain
                                    View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392
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