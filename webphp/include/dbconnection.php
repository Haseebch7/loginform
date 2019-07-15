<?php
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="webphp";
  $constr = mysqli_connect($servername,$username,$password,$dbname);

if($constr)
{
	echo("");
}
else
{
	echo("connection is faild");
}
?>
