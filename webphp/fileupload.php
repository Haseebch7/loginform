<?php
 include("include/dbconnection.php");

?>

<html>
  <head>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/js/jquery.js"></script>
<link href="css/user_log.css" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<!------ Include the above in your HEAD tag ---------->

  </head>
  
<body id="LoginForm">

<?php
   Include("include/header.php");
 ?>

<div class="container">

<div class="login-form">
<div class="main-div" >
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="form-group">
            <input type="file" name="pic"  required >
        </div>
        
        <button type="submit" class="btn btn-primary" name="BtnUpload">Upload</button>

    </form>
    </div>
</div>
</div>
</div>

</body>
</html>

<?php
 
if(isset($_POST['BtnUpload']))
{
  $target = "image/";
  $pic = $_FILES['pic']['name'];

  if (move_uploaded_file($_FILES['pic']['tmp_name'], $target."".$pic)) 
  {
     echo "<script>alert('File Upload Successful')</script>";
  }
   
}

?>