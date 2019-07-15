  <?php
  include("include/dbconnection.php");
  session_start();
?>
<html>
  <head>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style.css" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<!------ Include the above in your HEAD tag ---------->

  </head>
  
<body>

<?php
   Include("include/header.php");
 ?>

<div class="container">

<div class="login-form">
  <div class="main-div" >
    <div class="panel">
      <h2 style="margin-bottom:7%; ">Update Product</h2>
    </div>
    <?php 
      $Query = "SELECT * FROM product WHERE id=".$_GET['id'];
      $Query_run = mysqli_query($constr, $Query);
      if (mysqli_num_rows($Query_run) > 0) 
      {
        while ($FetchData = mysqli_fetch_array($Query_run)) 
        {
    ?>
      <form id="Login" name="product" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" name="TxtName" value="<?php echo $FetchData['productname']; ?>" class="form-control" id="inputname" placeholder="Product Name" required>
        </div>

        <div class="form-group">
          <input type="textarea" name="Txtdescription" value="<?php echo $FetchData['description']; ?>" class="form-control" id="inputname" placeholder="description" required>
        </div>

        <div class="form-group">
            <input type="number" name="TxtPrice" value="<?php echo $FetchData['price']; ?>" class="form-control" id="inputEmail" placeholder="Price" required>
        </div>
         <div class="form-group">
            <img src="image/<?php echo $FetchData['image']; ?>" style="width:100px; height:50px";   required style="margin-top: 10px; margin-bottom: 10px;">

             <input type="file" name="pic" required style="margin-top: 10px; margin-bottom: 10px;">
        </div>

        <div class="form-group">
            <input type="number" name="TxtStock" value="<?php echo $FetchData['stock']; ?>" class="form-control" id="inputname" placeholder="Stock" required>
        </div>
        <div class="form-group">
            <input type="number" name="TxtStatus" value="<?php echo $FetchData['status']; ?>" class="form-control" id="inputname" placeholder="Status" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="BtnUpdate">Update</button>
      </form>
    <?php
       }
      }
     
    ?>

  </div><!-- end main-div -->

</div><!-- end login-form -->
</div><!-- end container -->

</body>
</html>


<?php
if (isset($_POST['BtnUpdate'])) 
{
      $target = "image/";
      $pic = $_FILES['pic']['name'];

     if (move_uploaded_file($_FILES['pic']['tmp_name'], $target."".$pic)) 
      {
        $Query = "UPDATE product SET 
        productname = '".$_POST['TxtName']."', 
        description  =  '".$_POST['Txtdescription']."', 
        price =  '".$_POST['TxtPrice']."', 
        image = '$pic', 
        stock  =  '".$_POST['TxtStock']."', 
        status  =  '".$_POST['TxtStatus']."'  
        WHERE id = ".$_GET['id']." ";

        $query_run = mysqli_query($constr, $Query);
        if ($query_run) 
        {
          echo "<script><alert'Data Updated Successfully'></script>";
        }
        else
        {
          echo "<script><alert'Data Not Updated'></script>";
        }
      }
}
?>