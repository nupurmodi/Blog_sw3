<?php
include("auth.php");
include("mysqlcon.php");
$query="SELECT bloggers.blogger_id as bid,blogdata.blog_id as id,title,description,category,author,creation_date,updation_date,blog_detail_image FROM blogdata,blog_details,bloggers where  bloggers.blogger_id=blogdata.blogger_id and blogdata.blog_id=blog_details.blog_id";
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
<script>
function validation(){
	var r = confirm("DELETE?");
		if (r == true) {
		return true;
		} else {
		return false;
}

</script>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="admin_main.php">Creative<span class="logo_colour">Blogs</span></a></h1>
          <h2>A new start</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="admin_main.php">Home</a></li>
          <li><a href="Bloggers.php">Bloggers</a></li>
		  <li ><a href="new_bloggers.php">New_Bloggers</a></li>
          <li><a href="queries.php">Queries</a></li>
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

		   while ($row = mysqli_fetch_array($result)) {
			   $title=$row["title"];
			   $id=$row["bid"];
			   
			   $content=$row["description"];
			   $creation_date=$row["creation_date"];
			   $update=$row["updation_date"];
			   $image=$row["blog_detail_image"];
			   $category=$row["category"];
			   $author=$row["author"];
			   $blog_id=$row["id"];

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
				 <h4>Author:&nbsp&nbsp  <a href="bloggersba.php?var=<?php echo $id;?>"><?php echo $author?></a></h4>
				 
				 <h4>Creation_date:<?php echo $creation_date?></h4>
				 <h4>Updation_date:<?php echo $update?></h4>
				<form name="edit" action="deleteblog.php" onsubmit="return confirm('DELETE?')"   method="post" >
				 <div class="form_settings">
				 <button name="blog_id" type="submit" class="submit" style="float:right" value="<?php echo $blog_id ?>"> DELETE</button>
				 </div>
				 </form>


				 
				 </div>
			   
		   <?php }}else{?>
		<h2>NO BLOGS</h2><?php }?>

		
      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="admin_main.php">Home</a> | <a href="Bloggers.php">Bloggers</a> | <a href="new_bloggers.php">New_Bloggers</a> | <a href="queries.php">Queries</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
