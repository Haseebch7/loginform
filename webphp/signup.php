<?php
   include("include/dbconnection.php");
 ?>

<html>
  <head>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/js/jquery.js"></script>
<link href="css/style.css" rel="stylesheet">
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
    <div class="panel">
   <h2>User Sign up</h2>
   <p>Please enter your username, email and password</p>
   </div>
    <form id="Login" name="signup" method="post"  enctype="multiple/form-data">
        <div class="form-group">
            <input type="text" name="TxtFName" class="form-control" id="inputname" placeholder="first Name" required>
        </div>

        <div class="form-group">
            <input type="text" name="TxtLName" class="form-control" id="inputname" placeholder="Last Name" required>
        </div>

        <div class="form-group">
            <input type="text" name="TxtEmail" class="form-control" id="inputEmail" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input type="password" name="TxtPassword" class="form-control" id="inputPassword" placeholder="Password" >
        </div> 

        <div class="form-group">
            <input type="password" name="TxtConfpassword" class="form-control" id="inputConfirm" placeholder="confirm password" >
        </div>

        <div class="form-group">   
           <input type="radio" name="TxtGender" value="male" style="margin-left: 0px;">Male
           <input type="radio" name="TxtGender" value="female" style="margin-left: 50px;">Female
        </div>

        <div class="form-group">
            <input type="file" name="fileupload"  id="FileUpload"  style="margin-top: 10px; margin-bottom: 10px;">
        </div>

        <div class="form-group">
            <input type="text" name="TxtAddress" class="form-control" id="inputname" placeholder="Address" required>
        </div>
        <div class="form-group">
            <input type="text" name="TxtPhone" class="form-control" id="inputname" placeholder="Phone#" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="BtnSignup">Signup</button>

    </form>
    </div>

</div>
</div>
</div>


</body>
</html>


<?php
  if (isset($_POST['BtnSignup'])) 
  {
    $Query="INSERT INTO signup(id, firstname, lastname, email, password, confirmpassword, gender, address, phone,)
    VALUES(NULL,'".$_POST['TxtFName']."', '".$_POST['TxtLName']."', '".$_POST['TxtEmail']."', 
    '".$_POST['TxtPassword']."', '".$_POST['TxtConfpassword']."', '".$_POST['TxtGender']."', '".$_POST['TxtAddress']."', '".$_POST['TxtPhone']."')";
    // echo $Query; 
    // die;
    $result= mysqli_query($constr, $Query);
    if ($result) 
     {
      echo "<font color='green'> Data Insert Successfully";
     }
    else
     {
      echo "Data Faield";
     }
  }
?>