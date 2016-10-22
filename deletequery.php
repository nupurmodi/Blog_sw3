<?php session_start();
include("mysqlcon.php");
if(isset($_POST["query"])){
	
	$id=$_POST["query"];
	$querydelete="DELETE FROM queries WHERE queryno='$id' ";


$retval = mysqli_query($con, $querydelete );
if(! $retval )
{
  die('Could not delete query: ' . mysqli_error($con));
  exit();
}
mysqli_close($con);
echo '<script>alert("query_deleted");</script>';
		header("refresh:0;url=queries.php");
	
	
}


?>