<?php include('partials/menu.php'); ?>
<br>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; // Displaying message successfully add message
            unset($_SESSION['add']); // remove that message 
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload']; // Displaying message successfully add message
            unset($_SESSION['upload']); // remove that message 
        }
        ?>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-3">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">

                    </td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['submit']))
        {
            //echo 'clicked';

            $title=$_POST['title'];

            if(isset($_POST['featured']))
            {
                $featured =$_POST['featured'];
            }
            else{
                $featured="No";
            }
            if(isset($_POST['active']))
            {
                $active =$_POST['active'];
            }
            else{
                $active="No";
            }
            //check image selected or not
             //print_r($_FILES['image']);
             //die();

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
                 $image_name="Food_Category_" .rand(000, 999) .'.'.$ext; // e.g Foot_Category_834.jpg or png

                 $source_path=$_FILES['image']['tmp_name'];

                 $destination_path="../images/category/".$image_name;

                 //finally upload image
                 $upload = move_uploaded_file($source_path,$destination_path);

                 //check image is uploaded or not
                 if($upload==false)
                 {
                     $_SESSION['upload'] ="<div class='error'>Failed to upload image.</div>";
                     header('location:' .SITEURL. 'admin/add-category.php');
                     
                     // stop the process so data will not inserted in database
                          die();
                 }
                }
             }
             else{
                 //dont upload image and set the image name value and set
                 $image_name="";
             }

            

            // create sql query to insert data into database
            $sql="INSERT INTO tbl_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
            ";

            //execute the query and save in database
            $res=mysqli_query($conn, $sql);

            //query executed or not and data save or not
            if($res==true)
            {
              $_SESSION['add'] ="<div class='success'>Category Added Successfully.</div>";
              header('location:' .SITEURL. 'admin/manage-category.php');
            }
            else{
                $_SESSION['add'] ="<div class='error'>Failed to add Category.</div>";
                header('location:' .SITEURL. 'admin/add-category.php');
            }
        }
        ?>


    </div>
</div>

<?php include('partials/footer.php');?>