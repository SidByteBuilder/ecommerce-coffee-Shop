<?php include('partials/menu.php')
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br /> <br />

        <?php 
          // get the id of selected admin
          $id=$_GET['id'];

          //create sql qurry to get details
          $sql="SELECT * FROM tbl_admin WHERE id=$id";

          //execute querry
          $res=mysqli_query($conn, $sql);
          
          //check querry executed or not
          if($res==TRUE)
          {
             $count = mysqli_num_rows($res);

             if($count==1)
             {
                 //get the details
                //echo "Admin Available";
                $row=mysqli_fetch_assoc($res);

                $full_name= $row['full_name'];
                $username= $row['username'];
             }
             else{
                 header('location:'.SITEURL.'admin/manage-admin.php');
             }

          }
          

        ?>

        <form action="" method="POST">
            <table class="tbl-3">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td col-span="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">

                    </td>

                </tr>

            </table>
        </form>
    </div>
</div>

<?php 
 if(isset($_POST['submit']))
 {
     //echo "button clicked";
     $id = $_POST['id'];
     $full_name =$_POST['full_name'];
     $username =$_POST['username'];

     $sql = "UPDATE tbl_admin SET
     full_name ='$full_name',
     username ='$username'
     WHERE id='$id'
     ";

     $res =mysqli_query($conn, $sql);

     if($res==TRUE)
     {
         $_SESSION['update'] = "<div class ='success'>Admin Update Successfully.</div>.";
         header('location:'.SITEURL.'admin/manage-admin.php');
     }
     else{
        $_SESSION['update'] = "<div class ='success'>Failed to Delete Admin.</div>.";
        header('location:'.SITEURL.'admin/manage-admin.php');
     }
 }
?>



<?php include('partials/footer.php')
?>