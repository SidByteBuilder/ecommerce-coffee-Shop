<?php include('partials/menu.php'); ?>

<!--Main content section start-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br /> <br />

        <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; // Displaying admin successfully add message
            unset($_SESSION['add']); // remove that message on manage admin page
        }
           if(isset($_SESSION['delete']))
           {
               echo $_SESSION['delete'];
               unset ($_SESSION['delete']);
           }

           if(isset($_SESSION['update']))
           {
               echo  $_SESSION['update'];
               unset($_SESSION ['update']);
           }

           if(isset($_SESSION['user-not-found']))
           {
               echo  $_SESSION['user-not-found'];
               unset($_SESSION ['user-not-found']);
           }

           if(isset($_SESSION['pwd-not-match']))
           {
               echo $_SESSION['pwd-not-match'];
               unset ($_SESSION['pwd-not-match']);
           }

           if(isset($_SESSION['change-pwd']))
           {
               echo $_SESSION['change-pwd'];
               unset ($_SESSION['change-pwd']);
           }

         ?>
        <br /> <br />

        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php 
            // Querry to Get all Admin
            $sql= "SELECT * FROM tbl_admin";
            //execute the querry
            $res = mysqli_query($conn, $sql);

            //check wether the query execute or not
                if($res==TRUE)
           {
                 //Count rows to check we have data in database or not
                 $count = mysqli_num_rows($res);

                 $sn=1; //Create a variable and assign the value 

                 //check the num of rows
                 if($count>0)
                 {
                    //we have data in database
                    while($rows=mysqli_fetch_assoc($res))
               {

                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];
                    ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $username; ?></td>
                <td>
                    <a href="<?php echo 'http://localhost/coffee/';?>admin/update-password.php?id= <?php echo $id;?>"
                        class="btn-primary">Change Password</a>
                    <a href="<?php echo 'http://localhost/coffee/';?>admin/update-admin.php?id= <?php echo $id; ?>"
                        class="btn-secondary">Update Admin</a>
                    <a href="<?php echo 'http://localhost/coffee/';?>admin/delete-admin.php?id= <?php echo $id; ?>"
                        class="btn-danger">Delete Admin</a>
                </td>
            </tr>

            <?php
                    
                }
            }
            else{

            }
        }
                    //display the value in our table 
  

?>


        </table>

    </div>

</div>

<!--Menu footer section start-->
<?php include('partials/footer.php');?>