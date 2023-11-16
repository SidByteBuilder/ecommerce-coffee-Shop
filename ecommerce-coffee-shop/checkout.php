<?php include('partials-front/navbar.php')  ?>

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Order Confirm</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a
                                href="<?php echo 'http://localhost/coffee/';?>">Home</a></span>
                        <span>Checkout</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>


<?php 
if(isset($_SESSION['order']))
{
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>
<section class="ftco-section text-center">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Your Order is Confirm</span>
                <br><br>
                <h2 class="mb-4">Thankyou</h2>
                <p>If you need any help please contact us</p>
            </div>
        </div>
    </div>


    <!-- .section -->


    <div class="container">
        <h1>Order Details</h1>
        <?php 
      if(isset($_SESSION['update']))
      {
         echo $_SESSION['update']; // Displaying message successfully add message
         unset($_SESSION['update']); // remove that message 
      }

  ?>
        <?php 
             //get all the orders details for database
             $sql="SELECT * FROM tbl_order ORDER BY id DESC LIMIT 1"; //order by descending means latest order apper on top

             $res =mysqli_query($conn, $sql);

             $count=mysqli_num_rows($res);
             $sn=1;

             if($count>0)
             {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $food=$row['food'];
                     $price=$row['price'];
                    $qty=$row['qty'];
                    $total=$row['total'];
                    $order_date=$row['order_date'];
                    $status=$row['status'];
                    $customer_name=$row['customer_name'];
                    $customer_contact=$row['customer_contact'];
                    $customer_email=$row['customer_email'];
                    $customer_address=$row['customer_address'];
                    //$active=$row['active'];

                    ?>

        <table class="container" class="text-center">

            <tr>
                <td>Food: <b></b></td>
                <td>
                    <input type="text" name="food" value="<?php echo $food; ?>">
                </td>
            </tr>
            <tr>
                <td>Price: <b></b></td>
                <td>
                    <input type="text" name="price" value="$<?php echo $price; ?>">
                </td>
            </tr>
            <tr>
                <td>Quantity: <b></b></td>
                <td>
                    <input type="text" name="qty" value="<?php echo $qty ?>">
                </td>
            </tr>
            <tr>
                <td>Total: <b></b></td>
                <td>
                    <input type="text" name="total" value="$<?php echo $total ?>">

                </td>
            </tr>

            <tr>
                <td>Order Date/ Time: <b></b></td>
                <td>
                    <input type="text" name="orderdate" value="<?php echo $order_date ?>">
                </td>
            </tr>
            <tr>
                <td>Customer Name: <b></b></td>
                <td>
                    <input type="text" name="customername" value="<?php echo $customer_name ?>">
                </td>
            </tr>


            <?php
                }
             }
             else{
                echo"<tr><td colspan='12' class='error'>Orders not Available</td></tr>";

             }
             
             ?>
            <br><br>
            <td>
                <a href="<?php echo 'http://localhost/coffee/';?>admin/update-food.php? id=<?php echo $id; ?>"
                    class="btn-secondary">Update Food</a>

                <a href="<?php echo 'http://localhost/coffee/';?>admin/delete-food.php? id=<?php echo $id; ?>& image_name=<?php echo $image_name; ?>"
                    class="btn-danger">Delete Food</a>
            </td>

        </table>

        <style>
        .btn-secondary {
            border: none;
            color: gold;
            padding: 15px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;

        }

        .btn-danger {
            border: none;
            color: gold;
            padding: 15px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;

        }
        </style>

    </div>
    </div>
</section>


<?php include('partials-front/footer.php') ?>