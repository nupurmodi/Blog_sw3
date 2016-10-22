<?php
include("auth.php");
include("mysqlcon.php");
$id= $_SESSION["user"];
$query="SELECT blogdata.blog_id as id,title,description,category,author,creation_date,updation_date,blog_detail_image FROM blogdata,blog_details,bloggers where email='$id' and bloggers.blogger_id=blogdata.blogger_id and blogdata.blog_id=blog_details.blog_id";
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
          <li class="selected" ><a href="My_blogs.php">My blogs</a></li>
		  <li ><a href="new_blog.php">New_Blog</a></li>
		  <li ><a href="myprofile.php">My profile</a></li>
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
		   if (mysqli_num_rows($result) > 0){

		   while ($row = mysqli_fetch_assoc($result)) {
			  
			   $title=$row["title"];
			   $blog_id=$row["id"];
			   $content=$row["description"];
			   $creation_date=$row["creation_date"];
			   $update=$row["updation_date"];
			   $image=$row["blog_detail_image"];
			   $category=$row["category"];
			   /*echo $title;
			   echo $blog_id;
			   echo $content;
			   echo $image;*/
			   ?>
			     <div id="mainbar_container">
				 <h2>Category:&nbsp&nbsp  <?php echo $category?></h2>
				 <h2>Title:&nbsp&nbsp  <?php echo $title?></h2>
				 <h2>Content:</h2><span class="left"><img src="<?php echo $image ?>" style="max-height:500px; width:auto"/></span>
				 <p><?php echo $content?></p>
				 <h4>Creation_date:<?php echo $creation_date?></h4>
				 <h4>Updation_date:<?php echo $update?></h4>
				 <form name="edit" action="edit.php"method="post" >
				 <div class="form_settings">
				 <button name="blog_id" type="submit" class="submit" style="float:right" value="<?php echo $blog_id ?>"> Edit</button>
				 </div>
				 </form>

				 
				 </div>
			   
		   <?php }}else{?>
		<h2>You have Written No Blogs</h2><?php }?>

			   
			   
			   
			   
			
		   
		   
		   

        
		
      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="blogger_main.php">Home</a> | <a href="My_blogs.php">My blogs</a> | <a href="new_blog.php">New_Blog</a> |<a href="myprofile.php">My profile</a>| <a href="contactb.php">Contact Us</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
