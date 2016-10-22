<?php
if(session_start())session_destroy();
?>
<!DOCTYPE HTML>

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
		var x = document.getElementById("First_name").value;
		var re=/^[\w ]+$/;
		if (x == null || x == "") {
        		alert(" First_Name must be filled out");
				myForm2.First_name.focus();

        		return false;
   			}
		if(!re.test(x))
			{
				alert("Error:First_Name contains INVALID characters");
				myForm2.First_name.focus();
				return false;
			}
			var y= document.getElementById("Last_name").value;
		if (y == null || y == "") {
        		alert(" Last_name must be filled out");
				myForm2.Last_name.focus();
        		return false;
   			}
		if(!re.test(y))
			{
				alert("Error:Last_Name contains INVALID characters");
				myForm2.Last_name.focus();
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
			
			var z = document.getElementById("password").value;
        	if(z == null || z == ""||z.length<6){
        		alert("PASSWORD is must 6 characters long");
				myForm2.password.focus();
        		return false;
        	}
			var w = document.getElementById("password1").value;
        	if(w == null || w== ""||w!=z){
        		alert("PASSWORD does not match");
				myForm2.password1.focus();
        		return false;
        	}
			
			
			alert("request sent");
			return true;
		
			
			
}
	</script>
	

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Creative<span class="logo_colour">Blogs</span></a></h1>
          <h2>A new start</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="index.php">Home</a></li>
          <li><a href="contact.php">Contact Us</a></li>
		  <li class="selected"><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
	  <div class="login" >
  <h2>Sign Up</h2>
  <form name="myForm2" action="signup_2.php"  onsubmit="return validateform()" method="post">
  <fieldset>
    <input type="text" placeholder="First_Name" ID="First_name" name="First_name"/>
	<input type="text" placeholder="Last_Name" ID="Last_name" name="Last_name"/>
	<input type="email" placeholder="Email_id" ID="email" name="email"/>
	<div class="gender">
	<label for="Male" >Male</label>
	<input type="radio" class="radio" name="Gender" value="Male" id="Male" checked> 
	<label for="Female" style="margin-left:70px;" >Female</label>
	<input type="radio" class="radio" name="Gender" value="Female" id="Female">
	</div>
	
  	<input type="password" placeholder="Password" ID="password" name="password" />
	<input type="password" placeholder="Confirm_Password" ID="password1" name="password1" />

	
  </fieldset>
  <input type="submit" value="Sign Up" />
  </form>
  
</div>
    
	  
	 
    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="contact.php">Contact Us</a> | <a href="login.php">Login</a> |</p>
     
    </div>
  </div>
</body>
</html>
