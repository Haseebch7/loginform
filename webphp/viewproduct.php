<?php
  include("include/dbconnection.php");
  session_start();
?>
<html>
  <head>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
<!-- <link href="css/style.css" rel="stylesheet"> -->
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

<div class="container" style="margin-top: 7%;">
  <h2 style="margin-bottom:3%; text-align: center;" class="text-warning">View Product</h2>

    <table class="table table-bordered text-center">
      <thead class="bg-dark text-white">
        <tr>
          <th>Name</th>
          <th >Description</th>
          <th>Price</th>
          <th>Image</th>
          <th>Stock</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>

    <tbody>

<?php
  $Query = "SELECT * FROM product";
  $data = mysqli_query($constr, $Query);
  if (mysqli_num_rows($data) > 0) 
  {
    while ($fethData = mysqli_fetch_array($data)) 
    {

?>   

  <tr class="text-center">
    <td align="center">
      <h3><?php echo $fethData['productname']; ?></h3>
    </td>
    <td >
      <h3><?php echo $fethData['description']; ?></h3>
    </td>
     
    <td>
      <h3><?php echo $fethData['price']; ?></h3>
    </td>
      
    <td>
      <center> 
      	<img src="image/<?php echo $fethData['image']; ?>"
          style="width:100px; height:50px; "> 
      </center>
    </t>
     
    <td>
      <h3><?php echo $fethData['stock']; ?></h3>
    </td>
     
    <td>
     	<!-- <a href="update.php"> Edit </a> -->
       <a href="update.php?id=<?=$fethData['id']; ?>"><button type="button" name="BtnEdit" class="btn btn-success"> Edit </button></a>
    </td>
    <td>
      	<!-- <a href="#"> Delete </a> -->
       <a href="delete.php?id=<?=$fethData['id']; ?>"><button type="button" name="BtnDelete" class="btn btn-danger" onclick="return checkdelete()"> Delete </button> </a>

    </td>
  </tr>

<?php
   }

  }   
?>
</tbody><!-- end tbody  -->
</table><!-- end table -->
</div>
</body>
</html>

<script type="text/javascript">
  function checkdelete()
  {
    return confirm ('Are You Sure You Want To Delete This Data???');
  }
</script>