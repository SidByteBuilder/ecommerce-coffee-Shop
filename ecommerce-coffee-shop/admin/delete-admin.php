<?php 

//include costant.php file here
include('../config/constant.php');

//get the id of admin to be deleted
$id = $_GET['id'];

//create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// redirect to manage admin page
 $res = mysqli_query($conn, $sql);

 //check querry executed successfully or not
 if($res==TRUE)
 {
   //echo "Admin deleted";
   $_SESSION['delete'] ="Admin Deleted Successfully";
   header('location:' .SITEURL. 'admin/manage-admin.php');
 }
 else{
     //echo "Admin deleted";

     $_SESSION ['delete'] ="Failed to Delete Try Again";
   header('location:' .SITEURL.'admin/manage-admin.php');

 }

?>