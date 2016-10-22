<?php
include("auth.php");
include("mysqlcon.php");

$query="SELECT blogger_id,first_name,last_name,gender,city,nationality,intro,image,email,blogger_creation_date,b_updation_date,activate FROM bloggers";
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
          <h1><a href="admin_main.php">Creative<span class="logo_colour">Blogs</span></a></h1>
          <h2>A new start</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="admin_main.php">Home</a></li>
          <li class="selected"><a href="Bloggers.php">Bloggers</a></li>
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
		   while ($row = mysqli_fetch_assoc($result)) {
			   
			   ?>
			     <div id="mainbar_container" style="width: 830px">
				 <span class="right"><img src="<?php echo $row["image"]; ?>" height="150" width="150"/></span>
				 <h4>First_Name:&nbsp&nbsp  <?php echo $row["first_name"] ?></h4>
				 <h4>Last_Name:&nbsp&nbsp  <?php echo $row["last_name"]?></h4>
				 <h4>Gender:&nbsp&nbsp  <?php echo $row["gender"]?></h4>
				 <h4>City:&nbsp&nbsp  <?php echo $row["city"]?></h4>
				 <h4>Creation_date:&nbsp&nbsp<?php echo $row["blogger_creation_date"]?></h4>
				 <h4>Updation_date:&nbsp&nbsp<?php echo $row["b_updation_date"]?></h4>
				 <h4>Email_Id:&nbsp&nbsp  <?php echo $row["email"] ?></h4>
				 <h4>Nationality:&nbsp&nbsp  <?php echo $row["nationality"]?></h4>
				 <h4>Status:Active?&nbsp&nbsp  <?php echo $row["activate"]?></h4>
				<h4>Brief Description About Author:&nbsp&nbsp  </h4>
				 <p style="border: .1em solid silver;border-radius: 3px;padding:2px;width:500px;"><?php echo $row["intro"] ?><br><br></p>
				 		<?php if(!strcmp($row["activate"],"yes")){?>
				 <form name="Deactivate" action="dectiveblogger.php" onsubmit="return confirm('DEACTIVATE?')"   method="post" >
				 <div class="form_settings">
				 <button name="blogger_id" type="submit" class="submit" style="float:right" value="<?php echo $row['blogger_id'] ?>"> DEACTIVATE</button>
				 </div>
				 </form>
						<?php }else{?>
							<form name="Activate" action="activeblogger.php" onsubmit="return confirm('ACTIVATE?')"   method="post" >
				 <div class="form_settings">
				 <button name="blogger_id" type="submit" class="submit" style="float:right" value="<?php echo $row['blogger_id'] ?>"> ACTIVATE</button>
				 </div>
				 </form>
						<?php }?>
				 <p>&nbsp;&nbsp;&nbsp;</p>

				 <form name="edit" action="deleteblogger.php" onsubmit="return confirm('DELETE?')"   method="post" >
				 <div class="form_settings">
				 <button name="blogger_id" type="submit" class="submit" style="float:right" value="<?php echo $row['blogger_id'] ?>"> DELETE</button>
				 </div>
				 </form>
				 
				
			
      </div>
		<?php }}else{?>
		<h2>NO BLOGGERS</h2><?php }?>


      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="admin_main.php">Home</a> | <a href="Bloggers.php">Bloggers</a> | <a href="new_bloggers.php">New_Bloggers</a> | <a href="queries.php">Queries</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
