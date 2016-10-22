<?php session_start();
include("mysqlcon.php");
if(isset($_POST["blogger_id"])){
	
	$id=$_POST["blogger_id"];
	$image="SELECT blog_detail_image,b.blog_id as bid FROM blog_details as b,blogdata as d where b.blog_id=d.blog_id and blogger_id='$id' ";
	$result = mysqli_query($con,$image);
	while($row = mysqli_fetch_assoc($result)){
	$ul=unlink($row['blog_detail_image']);
if($ul){
$bid=$row["bid"];
$query1="DELETE FROM blog_details WHERE blog_id='$bid' ";
$imdelete=mysqli_query( $con,$query1 );
if(! $imdelete )
{
  die('Could not delete image: ' . mysqli_error($con));
  exit();
}
$query="DELETE FROM blogdata WHERE blog_id='$bid' ";
$retval = mysqli_query( $con,$query);
if(! $retval )
{
  die('Could not delete data: ' . mysqli_error($con));
  exit();
}
}
	}
	$bim="SELECT image FROM bloggers WHERE blogger_id='$id' ";
	$result = mysqli_query($con,$bim);
	$row = mysqli_fetch_assoc($result);
	$ul=unlink($row['image']);
	$query2="DELETE FROM bloggers WHERE blogger_id='$id' ";
	if(!mysqli_query($con,$query2)){
	 die('error deleting blogger'.mysqli_error($con)) ;
	 exit();
			}
mysqli_close($con);
echo '<script>alert("Blogger Deleted");</script>';
		header("refresh:0;url=Bloggers.php");
	
	
}
else echo'no id';


?>
	