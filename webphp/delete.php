<?php
include ('include/dbconnection.php');

$id = $_GET['id'];

$Query = " DELETE FROM product WHERE id= $id ";
$Query_run = mysqli_query($constr, $Query);
if ($Query_run) 
{
	header('location:viewproduct.php');
}
else
{
	echo "<script><alert'Data Not Delete'></script>";
}

?>