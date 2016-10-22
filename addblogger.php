<?php
session_start();
include("mysqlcon.php");
 if(!empty($_POST['First_Name'])) {
    foreach($_POST['First_Name'] as $check) {
			$matches=array();
            $matches=explode(',',$check);
			$fname=$matches[0];
			$lname=$matches[1];
			$email=$matches[2];
			$gender=$matches[3];
			$pass=$matches[4];
			$date=date('Y-m-d');
			$sqlinsert="INSERT INTO bloggers(first_name,last_name,email,gender,password,blogger_creation_date) VALUES ('$fname','$lname','$email','$gender','$pass','$date')";
  if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record'.mysqli_error($con)) ;
	 exit();
			}
  
  else {
$lines = file('blogger.txt');
$has=$_POST['First_Name'];
foreach($lines as $key => $line)
{if(stristr($line, $check)) {
	if($key==0) {array_splice($lines,$key,$key+1);}
	else array_splice($lines,$key,$key);
}
	
}
  
  $data = implode("",$lines);
$file = fopen('blogger.txt','w');
fwrite($file, $data);
fclose($file);


 }
 }
 }
 
mysqli_close($con);
header("Location:new_bloggers.php");
?>
