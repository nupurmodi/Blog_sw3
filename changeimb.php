<?php session_start();
include("mysqlcon.php");
if(isset($_POST["blog_id"])){
$id=$_POST["blog_id"];
echo $id;
	$file_name=$_FILES['pic']['name'];
	$file_temp=$_FILES['pic']['tmp_name'];
	$file_type=$_FILES['pic']['type'];
	
	if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "image/JPEG" && $file_type != "image/PNG" && $file_type != "image/JPG" && $file_type != "image/GIF"&& $file_type != "image/gif" ) {
     echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
		header("refresh:0;url=My_blogs.php");
		exit();
}	
	$image="SELECT blog_detail_image FROM blog_details where blog_id='$id' ";
	$result = mysqli_query($con,$image);
	$row = mysqli_fetch_assoc($result);
	 $ul=unlink($row['blog_detail_image']);
if($ul){
		$target_dir="uploads/";
	   $target_file = $target_dir . basename($file_name);
	if(move_uploaded_file($file_temp,$target_file)){
	$insquery="UPDATE blog_details SET blog_detail_image='$target_file'  WHERE blog_id= $id";
	if(!mysqli_query($con,$insquery)){
	 die('error updating image'.mysqli_error($con)) ;
	 //header("Location:new_blog.php");
	 exit();
			}
			header("Location:My_blogs.php");
}
}
else {
	echo '<script>alert("Can not change image ");</script>';
		header("refresh:0;url=My_blogs.php");
	
	
	
}
			


}
?>