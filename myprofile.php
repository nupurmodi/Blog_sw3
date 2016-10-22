<?php
include("auth.php");
include("mysqlcon.php");
$id= $_SESSION["user"];
$query="SELECT blogger_id,first_name,last_name,email,gender,city,nationality,intro,image,blogger_creation_date,b_updation_date,activate FROM bloggers where email='$id'";
$result = mysqli_query($con,$query);
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
		  <li ><a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
       </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
	  
	  <div id="content">
           <?php 
		   $row = mysqli_fetch_assoc($result);
			   $_SESSION["first_Name"]=$row["first_name"];
			   $_SESSION["last_Name"]=$row["last_name"];
			   $_SESSION["gender"]=$row["gender"];
			   $_SESSION["city"]=$row["city"];
			   $_SESSION["image"]=$row["image"];
			   $_SESSION["nation"]=$row["nationality"];
			   $_SESSION["bid"]=$row["blogger_id"];
			   $_SESSION["intro"]=$row["intro"];
			   
			   ?>
			     <div id="mainbar_container" style="width: 830px">
				 <span class="right"><img src="<?php echo $row["image"]; ?>" height="150" width="150"/></span>
				 <h4>First_Name:&nbsp&nbsp  <?php echo $row["first_name"] ?></h4>
				 <h4>Last_Name:&nbsp&nbsp  <?php echo $row["last_name"]?></h4>
				 <h4>Gender:&nbsp&nbsp  <?php echo $row["gender"]?></h4>
				 <h4>City:&nbsp&nbsp  <?php echo $row["city"]?></h4>
				 <h4>Nationality:&nbsp&nbsp  <?php echo $row["nationality"]?></h4>
				 <h4>Creation_date:&nbsp&nbsp<?php echo $row["blogger_creation_date"]?></h4>
				 <h4>Updation_date:&nbsp&nbsp<?php echo $row["b_updation_date"]?></h4>

				 <h4>Email_Id:&nbsp&nbsp  <?php echo $row["email"] ?></h4>
				  <h4>Status:Active?&nbsp&nbsp  <?php echo $row["activate"]?></h4>
				<h4>Brief Description About Yourself:&nbsp&nbsp  </h4>
				 <p style="border: .1em solid silver;border-radius: 3px;padding:2px;"><?php echo $row["intro"] ?><br><br></p>
				
				 <form name="edit" action="editprofile.php"method="post" >
				 <div class="form_settings">
				 <button name="blogger_id" type="submit" class="submit" style="float:right" value="submit"> Edit Profile</button>
				 </div>
				 </form>

				 
				 </div>
			   
		   
			   
			   
			   
			   
			
		   
		   
		   

        
		
      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="blogger_main.php">Home</a> | <a href="My_blogs.php">My blogs</a> | <a href="new_blog.php">New_Blog</a> |<a href="myprofile.php">My profile</a>| <a href="contactb.php">Contact Us</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
