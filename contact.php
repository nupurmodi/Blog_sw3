


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
		var x = document.getElementById("name").value;
		
		var re=/^[\w ]+$/;
		if (x == null || x == "") {
        		alert(" Name must be filled out");
				myForm2.name.focus();

        		return false;
   			}
		if(!re.test(x))
			{
				alert("Error:Name contains INVALID characters");
				myForm2.name.focus();
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
			
		var y = document.getElementById("subject").value;
		
		if (y == null || y== "") {
        		alert(" Subject must be filled out");
				myForm2.subject.focus();

        		return false;
   			}
		var y = document.getElementById("enquiry").value;
		
		if (y == null || y== "") {
        		alert(" Message must be filled out");
				myForm2.enquiry.focus();

        		return false;
   			}
		
		var r = confirm("SEND QUERY?");
		if (r == true) {
		return true;
		} else {
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
          <li class="selected"><a href="contact.php">Contact Us</a></li>
		  <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
       <div id="content">
        <h2>Contact Us:</h2>  
		 <form   name="myForm2" onsubmit="return validateform()"   action="contact_db.php" method="post" enctype="multipart/form-data" >
          <div class="form_settings">
            <p><span>Name:</span><input  type="text" name="name" id="name" maxlength="50"/></p>
            <p><span>Email Address:</span><input  type="email" name="email" id="email" maxlength="50" /></p>
			<p><span>Subject:</span><input type="text" name="subject" id="subject" maxlength="50"/></p>
            <p><span>Message:</span><textarea rows="8" cols="50" name="enquiry" id="enquiry" maxlength="500"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="SEND QUERY" /></p>
          </div>  
	</form>		  
      </div>
    </div>

      
       
     

    
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a>  | <a href="contact.php">Contact Us</a> | <a href="login.php">Login</a> |</p>
     
    </div>
  </div>
</body>
</html>
