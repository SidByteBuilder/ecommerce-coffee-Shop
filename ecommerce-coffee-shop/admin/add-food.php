<?php
include('partials/menu.php')

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php
       if(isset($_SESSION['upload']))
       {
           echo $_SESSION['upload']; // Displaying message successfully add message
           unset($_SESSION['upload']); // remove that message 
       }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-3">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the food">
                    </td>

                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"
                            placeholder="Description of the food"> </textarea>
                    </td>

                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>

                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>

                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php 
                    $sql ="SELECT * FROM tbl_category WHERE active='Yes'";
                    $res =mysqli_query($conn, $sql);
                    $count=mysqli_num_rows($res);

                    if($count>0)
                    {
                           while($row=mysqli_fetch_assoc($res))
                           {
                               $id = $row['id'];
                               $title = $row['title'];
                               ?>
                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                            <?php
                           }
                    }
                    else{
                          ?>
                            <option value="0">No Category Found</option>
                            <?php
                    }
                    
                    ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">
                        Yes
                        <input type="radio" name="featured" value="No">
                        No
                    </td>
                </tr>

                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes">
                    Yes
                    <input type="radio" name="active" value="No">
                    No
                </td>
                </tr>

                <td colspan="2">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>

            </table>
        </form>

        <?php 
         if(isset($_POST['submit']))
         {
             //echo "ADD";

             $title=$_POST['title'];
             $description=$_POST['description'];
             $price=$_POST['price'];
             $category=$_POST['category'];

             //check featured and active radio button checked or not
             if(isset($_POST['featured']))
             {
                 $featured= $_POST['featured'];
             }
             else{
                 $featured = "No";
             }

             if(isset($_POST['active']))
             {
                 $active= $_POST['active'];
             }
             else{
                 $active = "No";
             }

             //Check image button click or not and upload the image when it selected
             if(isset($_FILES['image']['name']))
             {
                 //upload image
                 $image_name= $_FILES['image']['name'];

                 //upload the image only if image is selected
                 if($image_name !="")
                 {

                 // auto rename image means if same image we upload
                 $ext= end(explode('.', $image_name));

                 //rename image
                 $image_name="Food_Name_" .rand(0000, 9999) .'.'.$ext; // e.g Foot_Category_834.jpg or png

                 $source_path=$_FILES['image']['tmp_name'];

                 $destination_path="../images/food/".$image_name;

                 //finally upload image
                 $upload = move_uploaded_file($source_path,$destination_path);

                 //check image is uploaded or not
                 if($upload==false)
                 {
                     $_SESSION['upload'] ="<div class='error'>Failed to upload image.</div>";
                     header('location:' .SITEURL. 'admin/add-food.php');
                     
                     // stop the process so data will not inserted in database
                          die();
                 }
                }
             }
             else{
                 //dont upload image and set the image name value and set
                 $image_name="";
             }


            // create sql query to save data from database
            $sql2 ="INSERT INTO tbl_food SET
            title='$title',
            description ='$description',
            price=$price,
            image_name='$image_name',
            category_id= $category,
            featured='$featured',
            active='$active'
                 ";

                 $res2 =mysqli_query($conn, $sql2);
                 if($res2==true)
                  {
                      $_SESSION['add']= "<div class='success'>Food Added Successfully.</div>";
                      header('location:' .SITEURL. 'admin/manage-food.php');
                      }
                      else{
                             $_SESSION['add']= "<div class='eror'>Failed to Add Food.</div>";
                              header('location:' .SITEURL. 'admin/manage-food.php');
                          }
         }
        ?>

    </div>
</div>



<?php
   include('partials/footer.php')
 ?>