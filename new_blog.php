<?php
include("auth.php");
include("mysqlcon.php");
$id=$_SESSION["user"];
$query1="select activate from bloggers where email='$id'";
$result1= mysqli_query($con,$query1);
$row1=mysqli_fetch_assoc($result1);
if(!strcmp($row1["activate"],"no")){
		   echo '<script>alert("YOUR ACCOUNT HAS BEEN DEACTIVATED.....\nYOU CAN NOT WRITE NEW BLOG..");</script>';

			header("refresh:0;url=blogger_main.php");
	   }
	   


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
		var x = document.getElementById("title").value;
		
		if (x == null || x == "") {
        		alert(" Title must be filled out");
				myForm2.title.focus();

        		return false;
   			}
			
		var y = document.getElementById("cont").value;
		
		if (y == null || y== "") {
        		alert(" Content must be filled out");
				myForm2.cont.focus();

        		return false;
   			}
		var z=document.myForm2.pic.value;
		if(z==null||z==""){
			alert(" image must be chosen");
				myForm2.pic.focus();

        		return false;
   			
		}
		var r = confirm("Insert Blog?");
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
          <h1><a href="blogger_main.php">Creative<span class="logo_colour">Blogs</span></a></h1>
          <h2>A new start</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="blogger_main.php">Home</a></li>
          <li><a href="My_blogs.php">My blogs</a></li>
		  <li class="selected"><a href="new_blog.php">New_Blog</a></li>
          <li><a href="myprofile.php">My profile</a></li>
			<li><a href="contactb.php">Contact Us</a></li>
		  <li ><a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
       </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
     
	 
	  <div id="content" style="width:1450px;">
      <h2><b>BLOG</b></h2>
        <form   name="myForm2" onsubmit="return validateform()"   action="ins_db.php" method="post" enctype="multipart/form-data" >
          <div class="form_settings">
            <p><span>Title:</span><input type="text" name="title" id="title" maxlength="50"/></p>
            <p><span>Description:</span><textarea rows="17" cols="75" name="content" id="cont" placeholder="Write Contents here..." maxlength="5000"></textarea></p>
            <p><span>Category:</span><select id="category" name="category">
			<option value="Food">Food</option>
			<option value="Travel">Travel</option>
			<option value="Phycology">Phycology</option>
			<option value="Philosophy">Philosophy</option>
			<option value="Others">Others</option>
			</select></p>
			<p><span>Image:</span><div class="upload"><input type="file" name="pic" id="pic" accept="image/*"></p></div>
		<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="Complete" /></p>
          </div>
        </form>
      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="blogger_main.php">Home</a> | <a href="My_blogs.php">My blogs</a> | <a href="new_blog.php">New_Blog</a> |<a href="myprofile.php">My profile</a>| <a href="contactb.php">Contact Us</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
