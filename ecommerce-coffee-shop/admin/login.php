<?php include('../config/constant.php') ?>

<html>

<head>

    <title>Login Coffee Shop</title>
    <link rel="stylesheet" href="../admin/admin.css">

</head>

<body>

    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login']; // Displaying admin successfully add message
            unset($_SESSION['login']); // remove that message 
        }

         if(isset($_SESSION['no-login-message']))
         {
            echo $_SESSION['no-login-message']; // Displaying login  message
            unset($_SESSION['no-login-message']);
         }

        ?>
        <br><br>
        <!--login form start here-->

        <form action="" method="POST">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"> <br> <br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"> <br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">

        </form>
        <br>




        <p class="text-center">Created By <a href="www.sidra.com">Sidra Tul Kubra</a></p>
    </div>
</body>

</html>

<?php 
  if(isset($_POST['submit']))
  {
      $username=$_POST['username'];
      $password= md5($_POST['password']);

      $sql = "SELECT * FROM tbl_admin WHERE username= '$username' AND password='$password'";

      $res = mysqli_query($conn, $sql);

      $count =mysqli_num_rows($res);

      if($count==1)
      {
         $_SESSION['login'] ="<div class='success'>Login Successfully</div>";
         $_SESSION['user'] =$username;
         
         header('location:' .SITEURL. 'admin/');

         
      }
      else{
        $_SESSION['login'] ="<div class='error text-center'>Login Failed</div>";
        header('location:' .SITEURL. 'admin/login.php');
      }
  }

?>