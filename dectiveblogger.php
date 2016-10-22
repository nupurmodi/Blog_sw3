<?php session_start();
include("mysqlcon.php");
if(isset($_POST["blogger_id"])){
	
	$id=$_POST["blogger_id"];
	$no="no";
	$insquery="UPDATE bloggers SET activate='$no'  WHERE blogger_id='$id'";
	if(!mysqli_query($con,$insquery)){
	 die('error deactivating'.mysqli_error($con)) ;
	 //header("Location:new_blog.php");
	 exit();
			}
	mysqli_close($con);
	echo '<script>alert("Blogger Deactivated");</script>';
	header("refresh:0;url=Bloggers.php");


	}
?>