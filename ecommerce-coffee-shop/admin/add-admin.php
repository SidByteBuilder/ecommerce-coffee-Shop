<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /> <br />

        <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; // Displaying admin successfully add message
            unset($_SESSION['add']); // remove that message on manage admin page
        }
         ?>




        <form action="" method="POST">
            <table class="tbl-3">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td col-span="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>

                </tr>

            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php 
if(isset ($_POST['submit']))
{
   // button clicked
   //echo "Button Clicked";

   //Get data from form
   $full_name = $_POST['full_name'];
   $username = $_POST['username'];
   $password = md5($_POST['password']); //pw increption with md5

   //SQL Query to save the data into database
   $sql ="INSERT INTO tbl_admin SET
   full_name= '$full_name',
   username= '$username',
   password = '$password'
   ";
  
   // execute querry and save data on database
   $res = mysqli_query($conn, $sql) or die(mysqli_error());

   //check data is inserted or not
   if($res==TRUE)
   {
      // echo "Data inserted";
      $_SESSION ['add'] = "Admin Added Successfully";
      
      //redirect page to manage admin page
      header("location:" .SITEURL.'admin/manage-admin.php');

     }
     else{
       //echo "Filed to Insert Data";
       // echo "Data inserted";
      $_SESSION ['add'] = "Failed to Add Admin";
      
      //redirect page to manage admin page
      header("location:" .SITEURL. 'admin/add-admin.php');

     }
     }

     ?>