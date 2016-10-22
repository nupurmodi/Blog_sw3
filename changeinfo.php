<?php session_start();
include("mysqlcon.php");
if(isset($_POST["submit"])){
			$fn=$_POST["firstname"];
			 $ln= $_POST["lastname"];
			 $gd=  $_POST["Gender"];
			 $city= $_POST["city"];
			 $nation=  $_POST["nation"];
			 $intro= $_POST["content"];
			 $email=$_POST["email"];
			 $intro = mysqli_real_escape_string($con,$intro);
		$city = mysqli_real_escape_string($con,$city);

		$id=$_SESSION["bid"];
		$insquery="UPDATE bloggers SET first_name='$fn' ,last_name='$ln',email='$email',gender='$gd',city='$city',nationality='$nation',intro='$intro' WHERE blogger_id='$id'";
		/*$insquery="UPDATE bloggers SET last_name='$ln'  WHERE blogger_id='$id'";
		$insquery="UPDATE bloggers SET email='$email'  WHERE blogger_id='$id'";
		$insquery="UPDATE bloggers SET gender='$gd'  WHERE blogger_id='$id'";
		$insquery="UPDATE bloggers SET city='$city'  WHERE blogger_id='$id'";
		$insquery="UPDATE bloggers SET nationality='$nation'  WHERE blogger_id='$id'";*/
		
		if(!mysqli_query($con,$insquery)){
	 die('error updating info'.mysqli_error($con)) ;
	 
	 exit();
			}
			if(strcmp($fn,$_SESSION["first_name"])){
			$insquery="UPDATE blogdata SET author='$fn'  WHERE blogger_id='$id'";
		if(!mysqli_query($con,$insquery)){
		die('error updating info'.mysqli_error($con)) ;
	 
		exit();
			}
		
				
			}
			$_SESSION["user"]=$email;
			header("Location:myprofile.php");
}

	
	
	
?>