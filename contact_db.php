<?php

if(isset($_POST["submit"]))
{include("mysqlcon.php");
$name=$_POST["name"];
	$subject=$_POST["subject"];
	$email=$_POST["email"];
	$message=$_POST["enquiry"];
	$date=date('Y-m-d');
$sqlinsert="INSERT INTO queries(name,email_id,subject,message,Date) VALUES ('$name','$email','$subject','$message','$date')";
	
  if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record'.mysqli_connect_error()) ;
	 exit();
			}
			
	else{
		echo '<script>alert("Query Sent");</script>';
		header("refresh:0;url=index.php");
	}
mysql_close($con);



}?>
