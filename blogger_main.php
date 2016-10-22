<?php
include("auth.php");
include("mysqlcon.php");
$id=$_SESSION["user"];
$query="SELECT bloggers.blogger_id as bid,title,description,category,author,creation_date,updation_date,blog_detail_image FROM blogdata,blog_details,bloggers where  bloggers.blogger_id=blogdata.blogger_id and blogdata.blog_id=blog_details.blog_id";
$query1="select first_name,activate from bloggers where email='$id'";
$result1= mysqli_query($con,$query1);
$row1=mysqli_fetch_assoc($result1);
$result = mysqli_query($con,$query);
?>


<!DOCTYPE HTML>
<html>

<head>
  <title>simplestyle_banner</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
			<h1><a href="blogger_main.php">Creative<span class="logo_colour">Blogs</span></a></h1>
          <h2>A new start</h2>
	
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="blogger_main.php">Home</a></li>
          <li><a href="My_blogs.php">My blogs</a></li>
		  <li ><a href="new_blog.php">New_Blog</a></li>
		  <li><a href="myprofile.php">My Profile</a></li>
          <li><a href="contactb.php">Contact Us</a></li>
		  <li ><a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
       </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
	  
	  <div id="content">
	  <h2 align="center"><u>WELCOME</u> &nbsp;&nbsp;<u><i><?php echo $row1["first_name"] ?></i></u></h2>
	  
       <?php 
	   if(!strcmp($row1["activate"],"no")){
		   echo'<h4 style="font-size:17px">YOUR ACCOUNT HAS BEEN DEACTIVATED BY ADMIN.</h4>';
	   }
	   if (mysqli_num_rows($result) > 0){
		   while ($row = mysqli_fetch_assoc($result)) {
			   $title=$row["title"];
			   $id=$row["bid"];
			   
			   $content=$row["description"];
			   $creation_date=$row["creation_date"];
			   $update=$row["updation_date"];
			   $image=$row["blog_detail_image"];
			   $category=$row["category"];
			   $author=$row["author"];
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
				 <h4>Author:&nbsp&nbsp  <a href="bloggersbb.php?var=<?php echo $id;?>"><?php echo $author?></a></h4>
				 
				 <h4>Creation_date:<?php echo $creation_date?></h4>
				 <h4>Updation_date:<?php echo $update?></h4>

				 
				 </div>
			   
		   <?php }}else{?>
		<h2>NO BLOGS</h2><?php }?>

			
      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="blogger_main.php">Home</a> | <a href="My_blogs.php">My blogs</a> | <a href="new_blog.php">New_Blog</a> |<a href="myprofile.php">My profile</a>| <a href="contactb.php">Contact Us</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
