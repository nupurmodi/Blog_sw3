<?php session_start();
include("mysqlcon.php");
if(isset($_POST["submit"])){
	
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>simplestyle_banner</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<script>

function validateform(){
		var x = document.getElementById("firstname").value;
		var flag=0;
		if (x == null || x == "") {
        		alert(" First name must be filled out");
				myForm2.firstname.focus();

        		return false;
   			}
			var z="<?php echo $_SESSION["first_Name"];?>";
		if(x!=z)	{
			flag++;
			alert(flag);
		}
		var y = document.getElementById("lastname").value;
		
		if (y == null || y == "") {
        		alert(" Last name must be filled out");
				myForm2.lastname.focus();

        		return false;
   			}
			z="<?php echo $_SESSION["last_Name"];?>";
		if(y!=z)	{
			flag++;
			alert(flag);
		}
		var y2 = document.getElementById("city").value;
		z="<?php echo $_SESSION["city"];?>";
		if (y2 == null || y2 == "") {
        		alert(" City  must be filled out");
				myForm2.city.focus();

        		return false;
   			}
		if(y2!=z)	{
			flag++;
		}
		var y3 = document.getElementById("nation").value;
		
		if (y3 == null || y3 == "") {
        		alert(" Nation  must be filled out");
				myForm2.nation.focus();

        		return false;
   			}
		
		var y4 = document.getElementById("cont").value;
		
		if (y4 == null || y4== "") {
        		alert(" Content must be filled out");
				myForm2.cont.focus();

        		return false;
   			}
			
		var x2 = document.forms["myForm2"]["email"].value;
			var atpos = x2.indexOf("@");
			var dotpos = x2.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x2.length) {
				alert("Not a valid e-mail address");
				myForm2.email.focus();
				return false;
			}
			
		
			
			return true;
}
function passcheck(){
	
	var z = document.getElementById("password").value;
        	if(z == null || z == ""||z.length<6){
        		alert("PASSWORD is must 6 characters long");
				pasform.password.focus();
        		return false;
        	}
			var w = document.getElementById("password1").value;
        	if(w == null || w== ""||w!=z){
        		alert("PASSWORD does not match");
				pasform.password1.focus();
        		return false;
        	}
			
			alert("password Changed");
			return true;
}
function validatim(){
	
	var z=document.imform.pic.value;
		if(z==null||z==""){
			alert(" image must be chosen");
				imform.pic.focus();

        		return false;
   			
		}
			
			return true;
}
</script>



<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="blogger_main.php">Creative<span class="logo_colour">Blogs</span></a></h1>
          <h2>A new start</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="blogger_main.php">Home</a></li>
          <li ><a href="My_blogs.php">My blogs</a></li>
		  <li ><a href="new_blog.php">New_Blog</a></li>
		  <li class="selected"><a href="myprofile.php">My profile</a></li>
          <li><a href="contactb.php">Contact Us</a></li>
		  <li ><a href="index.php">Logout</a></li>
       </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
      
	<div id="content" style="width:1450px;">
	  
	  
			
	  
              <h2>Change Image:</h2>
			  <img src="<?php echo $_SESSION["image"]; ?>" height="150" width="150" /></span>
			   <form   name="imform" onsubmit="return validatim()"   action="changeim.php" method="post" enctype="multipart/form-data" >
			      <div class="form_settings">
			   <p><span><input type="file" name="pic" id="pic" accept="image/*" ></span><input type="submit" id="myBtn" class="submit" name="submit" value="UPLOAD" > </p>
			   </div>
			   </form>

			  <h2>Change Information:</h2>
        <form   name="myForm2" onsubmit="return validateform()"   action="changeinfo.php" method="post" enctype="multipart/form-data" >
          <div class="form_settings">
            <p><span>First_Name</span><input type="text" name="firstname" id="firstname" maxlength="20" value="<?php echo  $_SESSION["first_Name"]?>" /></p>
			<p><span>Last_Name</span><input type="text" name="lastname" id="lastname" maxlength="20" value="<?php echo  $_SESSION["last_Name"]?>"/></p>
			<p><span>Email_id</span><input type="email" name="email" id="email" maxlength="20" value="<?php echo  $_SESSION["user"]?>"/></p>
			<p><span>Gender:</span>
			<?php if(!strcmp($_SESSION["gender"],"Male")){
				echo '<span><input type="radio" class="radio" name="Gender" value="Male" id="Male" checked> Male</span>';
				echo '<input type="radio" class="radio" name="Gender" value="Female" id="Female">Female</p><br>';
			}
			else 
			{
				echo '<span><input type="radio" class="radio" name="Gender" value="Male" id="Male" > Male</span>';
				echo '<input type="radio" class="radio" name="Gender" value="Female" id="Female" checked>Female</p><br>';

			}
			?>
	

			<p><span>City</span><input type="text" name="city" id="city" maxlength="50" value="<?php echo  $_SESSION["city"]?>"/></p>
			<p><span>Nationality</span><input type="text" name="nation" id="nation" maxlength="20" value="<?php echo  $_SESSION["nation"]?>"/></p>
            <p><span>Description:</span><textarea rows="17" cols="75" name="content" id="cont" maxlength="200"><?php echo $_SESSION["intro"]?> </textarea></p>
			
			<!--<p><span> Change Image:</span><div class="upload"><input type="file" name="pic" id="pic" accept="image/*" ></p></div>-->
			<p style="padding-top: 15px"><span>&nbsp;</span><button  type="submit"  class="submit" name="submit" value="submit" > Edit</button></p>
			<hr>
          </div>
        </form>
		
	  <h2>Change Password</h2>
      <form method="post" action="changepass.php" onsubmit="return passcheck();" name="pasform">
	<div class="form_settings1">
    <input type="password" placeholder="Password" ID="password" name="password" /></p>
	<input type="password" placeholder="Confirm_Password" ID="password1" name="password1" />
	<input type="submit" id="myBtn" class="submit" value="change" name="submit" > 
	</div>
	</form>
	   
			   
			   
			
		   
		   
		   

        
		
      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="blogger_main.php">Home</a> | <a href="My_blogs.php">My blogs</a> | <a href="new_blog.php">New_Blog</a> |<a href="myprofile.php">My profile</a>| <a href="contactb.php">Contact Us</a> |<a href="index.php">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
