
<?php
include("mysqlcon.php");
if(isset($_POST["submit"])){
	$admin="nupuramodi@gmail.com";
	$adp="siyaram";
 
$id=$_POST['email'];
  $pwd=$_POST["password"];
  if(!strcmp($id,$admin) && !strcmp($pwd,$adp))
  {		session_start();
	$_SESSION["user"]=$admin;

    
	  header("Location:admin_main.php");
  }
  
 else{ $query="SELECT email,password FROM bloggers WHERE email='$id' and password='$pwd'";
  
		$result = mysqli_query($con,$query);
		//echo $result;

        $num= mysqli_num_rows($result);
		if($num==1)
		{	
		session_start();
		$_SESSION["user"]=$id;

		header("Location:blogger_main.php");}
		else {
		
		echo '<script>alert("Invalid Username Or Password");</script>';
		header("refresh:0;url=login.php");
       
		//echo "<script>setTimeout(function(){window.location.href='login.php'},100);</script>";
 }
 }
}
mysqli_close($con)
?>
