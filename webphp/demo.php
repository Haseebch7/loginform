<?php
   session_start();
if(isset($_SESSION['signup_ID']))
	{
		header('location:index.php');
	}
else
{
	header('location:login.php');
}


 ?>

 