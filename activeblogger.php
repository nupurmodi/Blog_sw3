<?php session_start();
include("mysqlcon.php");
if(isset($_POST["blogger_id"])){
	
	$id=$_POST["blogger_id"];
	$yes="yes";
	$insquery="UPDATE bloggers SET activate='$yes'  WHERE blogger_id='$id'";
	if(!mysqli_query($con,$insquery)){
	 die('error deactivating'.mysqli_error($con)) ;
	 //header("Location:new_blog.php");
	 exit();
			}
	mysqli_close($con);
	echo '<script>alert("Blogger Activated");</script>';
	header("refresh:0;url=Bloggers.php");


	}
?>