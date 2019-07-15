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
        <h2 style="margin-bottom:7%; ">Product</h2>
   </div>
    <form id="Login" name="product" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="TxtName" class="form-control" id="inputname" placeholder="Product Name" required>
        </div>

        <div class="form-group">
          <input type="textarea" name="Txtdescription" value="" class="form-control" id="inputname" placeholder="description" required>
        </div>

        <div class="form-group">
            <input type="number" name="TxtPrice" class="form-control" id="inputEmail" placeholder="Price" required>
        </div>
         <div class="form-group">
            <input type="file" name="pic"  id="FileUpload" required style="margin-top: 10px; margin-bottom: 10px;">
        </div>

        <div class="form-group">
            <input type="number" name="TxtStock" class="form-control" id="inputname" placeholder="Stock" required>
        </div>
        <div class="form-group">
            <input type="number" name="TxtStatus" class="form-control" id="inputname" placeholder="Status" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="BtnProduct">Product</button>

    </form>
    </div>

</div>
</div>
</div>

</body>
</html>


<?php
if (isset($_POST['BtnProduct']))
{
  $target = "image/";
  $pic = $_FILES['pic']['name'];

  if (move_uploaded_file($_FILES['pic']['tmp_name'], $target."".$pic)) 
  {
     $Query = "INSERT INTO product (id, productname, description, price, image, stock, status)
     VALUES (Null, '".$_POST['TxtName']."', '".$_POST['Txtdescription']."', '".$_POST['TxtPrice']."', '$pic', '".$_POST['TxtStock']."', '".$_POST['TxtStatus']."' )" ;
   
    $product = mysqli_query($constr, $Query);

    if ($product) 
      {
        echo "<script> alert('Data Insert Successfully') </script>";
      }
    else
      {
        echo "<script> alert('Data Not Insert') </script>";
      }
  }
 
}

?>