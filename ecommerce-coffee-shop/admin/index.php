<!--Menu section -->
<?php include('partials/menu.php'); ?>


<!--Main content section start-->
<div class="main-content">
    <div class="wrapper">
        <h1>DASHBOARD</h1>
        <br><br>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login']; // Displaying admin successfully add message
            unset($_SESSION['login']); // remove that message on manage admin page
        }
        ?>
        <br><br>
        <div class="col-4 text-center">
            <?php 
        $sql="SELECT * FROM tbl_category";

        $res=mysqli_query($conn, $sql);

        $count=mysqli_num_rows($res);
        ?>
            <h1><?php echo $count; ?></h1>
            <br />
            Categories
        </div>
        <div class="col-4 text-center">
            <?php 
        $sql2="SELECT * FROM tbl_food";

        $res2=mysqli_query($conn, $sql2);

        $count2=mysqli_num_rows($res2);
        ?>
            <h1><?php echo $count2; ?></h1>
            <br />
            Foods
        </div>
        <div class="col-4 text-center">
            <?php 
        $sql3="SELECT * FROM tbl_order";

        $res3=mysqli_query($conn, $sql3);

        $count3=mysqli_num_rows($res3);
        ?>
            <h1><?php echo $count3; ?></h1>
            <br />
            Total Orders
        </div>
        <div class="col-4 text-center">
            <?php 
        //Create sql queryto get total revenue
        // use Aggrgate Function in SQL for total revenue
        $sql4="SELECT SUM(total) AS Total FROM tbl_order WHERE status ='Delivered'";

        $res4=mysqli_query($conn, $sql4);

        $row4=mysqli_fetch_assoc($res4);

        //create totl revenue
        $total_revenue=$row4['Total'];
        ?>
            <h1>$<?php echo $total_revenue; ?></h1>
            <br />
            Revenue Generator
        </div>
        <div class="clearfix"></div>


    </div>

</div>

<?php include('partials/footer.php'); ?>