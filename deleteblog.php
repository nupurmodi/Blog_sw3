<?php session_start();
include("mysqlcon.php");
if(isset($_POST["blog_id"])){
	
	$id=$_POST["blog_id"];
	$image="SELECT blog_detail_image FROM blog_details where blog_id='$id' ";
	$result = mysqli_query($con,$image);
	$row = mysqli_fetch_assoc($result);

	$query="DELETE FROM blogdata WHERE blog_id='$id' ";
	$query1="DELETE FROM blog_details WHERE blog_id='$id' ";
	
 $ul=unlink($row['blog_detail_image']);
if($ul){
$imdelete=mysqli_query( $con,$query1);
if(! $imdelete )
{
  die('Could not delete image: ' . mysqli_error($con));
  exit();
}

$retval = mysqli_query($con, $query);
if(! $retval )
{
  die('Could not delete data: ' . mysqli_error($con));
  exit();
}
mysqli_close($con);
echo '<script>alert("Blog Deleted");</script>';
		header("refresh:0;url=admin_main.php");
	
	
}else echo"can't delete image";
}

?>