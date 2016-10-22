<?php session_start();
include("mysqlcon.php");
if(isset($_POST["submit"])){
		$pass=$_POST["password"];
		$id=$_SESSION["bid"];
		$insquery="UPDATE bloggers SET password='$pass'  WHERE blogger_id='$id'";
		if(!mysqli_query($con,$insquery)){
	 die('error updating password'.mysqli_connect_error()) ;
	 
	 exit();
			}
			header("Location:myprofile.php");
}

	
	
	
?>