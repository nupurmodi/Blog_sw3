
<?php

include("mysqlcon.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
$fname=$_POST["First_name"];
$lname=$_POST["Last_name"];
$email=$_POST["email"];
$password=$_POST["password"];
$gender=$_POST["Gender"];
$cfile="blogger.txt";
$query="SELECT blogger_id FROM bloggers WHERE email='$email'";
$result = mysqli_query($con,$query);
			$num= mysqli_num_rows($result);
			if($num==0){
$fh=fopen($cfile,'a+');
if(filesize($cfile)==0)
{
$store=$fname.",".$lname.",".$email.",".$gender.",".$password;
fwrite($fh,$store);
fclose($fh);

}
else {
$store="\n".$fname.",".$lname.",".$email.",".$gender.",".$password;
fwrite($fh,$store);
fclose($fh);
}
mysqli_close($con);
header("Location:index.php");
			}
else{
	echo '<script>alert("User already exist");</script>';
	header("refresh:0;url=login.php");
}
			

}
?>