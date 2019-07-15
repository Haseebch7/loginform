<?php
  include("include/dbconnection.php");
?>
 
<html>
<head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
  
<body id="LoginForm">

<!--- Navbar -->

<header>
<?php
  include("include/header.php")
?>


<!--- Container -->

<div class="container" style="margin-top: 7%;">

<div class="login-form">
<div class="main-div" >
    <div class="panel">
   <h2>User Login</h2>
   <p>Please enter your email and password</p>
   </div>
    <form id="Login" action="" method="POST" >

        <div class="form-group">
            <input type="email" name="TxtEmail" class="form-control" id="inputEmail" placeholder="Email Address">
        </div>

        <div class="form-group">
           <input type="password" name="TxtPassword" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <!-- <div class="forgot">
          <a href="user-signup.php">Signup</a>
        </div> -->
        <button type="submit" name="BtnLogin" class="btn btn-primary">Login</button>

    </form>
    </div>

</div>
</div>
</div>

</body>
</html>



<?php

if(isset($_POST['BtnLogin']) )
{
  $query="SELECT * FROM signup 
   WHERE email = '".$_POST['TxtEmail']."' 
   AND password = '".$_POST['TxtPassword']."' ";

  $Result = mysqli_query($constr, $query);
  if (mysqli_num_rows($Result) > 0)
   {
      session_start();
      session_regenerate_id();
      $login = mysqli_fetch_assoc($Result);
      
      $_SESSION['signup_ID'] =         $login['id'];
      $_SESSION['signup_FIRSTName'] =  $login['firstname'];

      session_write_close();

      header("location:index.php ");
   }
   else
   {
      echo "<script> alert('Email or Password is Incorrect!')</script>";
   }
}
 ?>
