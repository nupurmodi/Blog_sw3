<?php session_start();
include("mysqlcon.php");
if(isset($_POST["submit"])){


	$file_name=$_FILES['pic']['name'];
	$file_temp=$_FILES['pic']['tmp_name'];
	$file_type=$_FILES['pic']['type'];
	echo $file_name;
	
	if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "image/JPEG" && $file_type != "image/PNG" && $file_type != "image/JPG" && $file_type != "image/GIF"&& $file_type != "image/gif" ) {
     echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
		header("refresh:0;url=editprofile.php");
		exit();
}	
		$id=$_SESSION["bid"];
		echo $id;
		$bim="SELECT image FROM bloggers WHERE blogger_id='$id' ";
	$result = mysqli_query($con,$bim);
	$row = mysqli_fetch_assoc($result);
	$ul=unlink($row['image']);
		$target_dir="buploads/";
	   $target_file = $target_dir . basename($file_name);
	if(move_uploaded_file($file_temp,$target_file)){
	$insquery="UPDATE bloggers SET image='$target_file'  WHERE blogger_id='$id'";
	if(!mysqli_query($con,$insquery)){
	 die('error updating image'.mysqli_error($con)) ;
	 //header("Location:new_blog.php");
	 exit();
			}
			$_SESSION["image"]=$target_file;
			header("Location:editprofile.php");
}
			


}
?>