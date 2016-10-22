
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
		function validateForm() {
			var x2 = document.forms["myForm2"]["email"].value;
			var atpos = x2.indexOf("@");
			var dotpos = x2.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x2.length) {
				alert("Not a valid e-mail address");
				myForm2.email.focus();
				return false;
			}
			var y = document.getElementById("password").value;
        	if(y == null || y == ""){
        		alert("PASSWORD is must");
				myForm2.password.focus();
        		return false;
        	}
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
	  <div class="login">
  <h2>Log In</h2>
  <form name="myForm2" action="fetch_db.php"  onsubmit="return validateForm()" method="post">
  <fieldset>
    <input type="email" placeholder="Email_id" ID="email" name="email"/>
  	<input type="password" placeholder="Password" ID="password" name="password" />
  </fieldset>
  <input type="submit" value="Log In" name="submit" />
  </form>
  <div class="utilities">
    <a href="signup.php">Sign Up &rarr;</a>
  </div>
</div>
    
	  
	 
    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="contact.php">Contact Us</a> | <a href="login.php">Login</a> |</p>
     
    </div>
  </div>
</body>
</html>
