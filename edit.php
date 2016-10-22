<?php include("auth.php");

include("mysqlcon.php");
if(isset($_POST["blog_id"])){
$id=$_POST["blog_id"];
$b=$_SESSION["user"];
$query="SELECT activate FROM bloggers WHERE email='$b'";
$result1 = mysqli_query($con,$query);
	$row1 = mysqli_fetch_assoc($result1);
	if(!strcmp($row1["activate"],"no")){
	echo '<script>alert("Your account is dectivated.\nYou Can not edit blog.");</script>';
	header("refresh:0;url=My_blogs.php");
	exit();
	}

$query="SELECT title,description,category,blog_detail_image FROM blogdata as a,blog_details as b where a.blog_id='$id' and a.blog_id=b.blog_id";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
				$title=$row["title"];
			   $content=$row["description"];
			   $image=$row["blog_detail_image"];
			   $category=$row["category"];
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
			var r = confirm("Save Changes?");
		if (r == true) {alert("Changes Saved.");
		return true;
		} else {
		return false;
}
		

			
			return true;
}
function validatim(){
	
	var z=document.imform.pic.value;
		if(z==null||z==""){
			alert(" image must be chosen");
				imform.pic.focus();

        		return false;
   			
		}
		var r = confirm("Upload Image?");
		if (r == true) {alert("Image Uploaded");
		return true;
		} else {
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
          <li class="selected"><a href="My_blogs.php">My blogs</a></li>
		  <li ><a href="new_blog.php">New_Blog</a></li>
		  <li><a href="myprofile.php">My profile</a></li>
          <li><a href="contactb.php">Contact Us</a></li>
		  <li><a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
       </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
      
	  
	  <div id="content" style="width:1450px;">
              <h2>Change Image:</h2>
			  <img src="<?php echo $image ;?>" height="150" width="150" /></span>
			   <form   name="imform" onsubmit="return validatim()"   action="changeimb.php" method="post" enctype="multipart/form-data" >
			      <div class="form_settings">
			   <p><span><input type="file" name="pic" id="pic" accept="image/*" ></span><button name="blog_id" type="submit" class="submit" value="<?php echo $id ?>"> Upload</button> </p>
			   </div>
			   </form>

			    <h2>Change Content:</h2></br></br>
        <form   name="myForm2" onsubmit="return validateform()"   action="edit_db.php" method="post" enctype="multipart/form-data" >
          <div class="form_settings">
            <p><span>Title:</span><input type="text" name="title" id="title" maxlength="50" value="<?php echo $title?>"/></p>
            <p><span>Description:</span><textarea rows="17" cols="75" name="content" id="cont" maxlength="5000"><?php echo $content?> </textarea></p>
            <p><span>Category:</span><select id="category" name="category">
			<option value="<?php echo $category?>" selected> <?php echo $category?> </option>
			<option value="Food">Food</option>
			<option value="Travel">Travel</option>
			<option value="Phycology">Phycology</option>
			<option value="Philosophy">Philosophy</option>
			<option value="Others">Others</option>
			</select></p>
			<p style="padding-top: 15px"><span>&nbsp;</span><button name="blog_id" type="submit" class="submit" value="<?php echo $id ?>"> Edit</button></p>
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
