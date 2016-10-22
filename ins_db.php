
<?php
session_start();
if(isset($_POST["submit"]))
{include("mysqlcon.php");
	$id= $_SESSION["user"];
	$query="SELECT activate FROM bloggers WHERE email='$id'";
$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	if(!strcmp($row["activate"],"yes")){

	$file_name=$_FILES['pic']['name'];
	$file_type=$_FILES['pic']['type'];
	
	$file_size=$_FILES['pic']['size'];
	$file_temp=$_FILES['pic']['tmp_name'];
	
	if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "image/JPEG" && $file_type != "image/PNG" && $file_type != "image/JPG" && $file_type != "image/GIF"&& $file_type != "image/gif" ) {
     echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
		echo "<script>setTimeout(function(){window.location.href='new_blog.php'},100);</script>";
}
	
else
{	
	$target_dir="uploads/";
	   $target_file = $target_dir . basename($file_name);

	$query="SELECT blogger_id,first_name FROM bloggers WHERE email='$id'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_row($result);
    $blogger_id=$row[0];
	$auther_name=$row[1];
	$title=$_POST["title"];
	$content=$_POST["content"];
	$content = mysqli_real_escape_string($con,$content);
		$title = mysqli_real_escape_string($con,$title);

	$category=$_POST["category"];
	$date=date('Y-m-d');
	$sqlinsert="INSERT INTO blogdata(title,description,category,blogger_id,author,creation_date) VALUES ('$title','$content','$category','$blogger_id','$auther_name','$date')";
	
  if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record'.mysqli_error($con)) ;
	 exit();
			}
	$query1="SELECT blog_id FROM blogdata WHERE title='$title' and description='$content' and category='$category' and blogger_id='$blogger_id' and author='$auther_name'";
	$result1 = mysqli_query($con,$query1);
	$row1 = mysqli_fetch_row($result1);
	$blog_id=$row1[0];
    

	
if(move_uploaded_file($file_temp,$target_file)){
	$insquery="INSERT INTO blog_details(blog_id,blog_detail_image) VALUES ('$blog_id','$target_file')";
	if(!mysqli_query($con,$insquery)){
	 die('error inserting new record'.mysqli_error($con)) ;
	 //header("Location:new_blog.php");
	 exit();
			}
					echo '<script>alert("Written New Blog!!!!");</script>';

			header("refresh:0;url=blogger_main.php");
}

//echo $auther_name;
		

	
	
	}}
	else{
		
		echo '<script>alert("Your account is dectivated.\nYou Can not insert new blog.");</script>';
	header("refresh:0;url=blogger_main.php");
	}
mysqli_close($con);
}
?>
