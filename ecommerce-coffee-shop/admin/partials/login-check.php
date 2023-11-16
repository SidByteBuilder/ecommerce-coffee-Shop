<?php
// Authorization ... Acess
//Checked user is login or not

if(!isset($_SESSION['user'])) // If user section is not set
{
   // user s not login
   //redirect to login page with message
   $_SESSION['no-login-message'] ="<div class='error'>Please Login To Access Admin Panel.</div>";
   
   //redirect to login page
   header('location:' .SITEURL. 'admin/login.php');
}


?>