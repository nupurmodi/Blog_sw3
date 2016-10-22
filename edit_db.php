<?php session_start();
include("mysqlcon.php");
if(isset($_POST["blog_id"])){
$id=$_POST["blog_id"];
	
	
	$title=$_POST["title"];
	$content=$_POST["content"];
	$category=$_POST["category"];
	$content = mysqli_real_escape_string($con,$content);
	$title = mysqli_real_escape_string($con,$title);
$sql = "UPDATE blogdata SET title ='$title'  WHERE blog_id='$id'";
$sql1="UPDATE blogdata SET description ='$content'  WHERE blog_id='$id'";
$sql2="UPDATE blogdata SET category ='$category'  WHERE blog_id='$id'";
if(!mysqli_query($con,$sql)){
	 die('error updating title'.mysqli_error($con)) ;
	 exit();
			}
if(!mysqli_query($con,$sql1)){
	 die('error updating content'.mysqli_error($con)) ;
	 exit();
			}
if(!mysqli_query($con,$sql2)){
	 die('error updating category'.mysqli_error($con)) ;
	 exit();
			}
		
		header("Location:My_blogs.php");	


}
?>