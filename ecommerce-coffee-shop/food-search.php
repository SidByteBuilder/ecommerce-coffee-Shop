<?php include('partials-front/navbar.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->

<!-- fOOD sEARCH Section Ends Here -->

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">

            <?php 
              //get the search keyword
               $search=$_POST['search'];
            ?>
            <h2 class="mb-4">Foods on Your Search<a href="#" class="text-white">"<?php echo $search ?>"</a></h2>

        </div>
    </div>

    <div class="row">
        <?php 
              
      $sql ="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";
      $res =mysqli_query($conn, $sql);
      $count=mysqli_num_rows($res);
            
      if($count>0)
      {
          while($row=mysqli_fetch_assoc($res))
          {
              $id=$row['id'];
              $title=$row['title'];
              $price=$row['price'];
              $description=$row['description'];
              $image_name=$row['image_name'];
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
                    <h3><a href="#"><?php echo $title;?></a></h3>
                    <p><?php echo $description; ?></p>
                    <p class="price"><span>$<?php echo $price; ?></span></p>
                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                </div>
            </div>
        </div>

        <?php
          }
        }
          else{
            echo"<div class='error'>Food not found</div>";
          }
               
     ?>

</section>

<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>