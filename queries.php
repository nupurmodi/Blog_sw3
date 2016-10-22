<?php
include("auth.php");
include("mysqlcon.php");
$query="SELECT * FROM queries";
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
          <h1><a href="admin_main.php">Creative<span class="logo_colour">Blogs</span></a></h1>
          <h2>A new start</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
 
          <li ><a href="admin_main.php">Home</a></li>
          <li><a href="Bloggers.php">Bloggers</a></li>
		  <li ><a href="new_bloggers.php">New_Bloggers</a></li>
          <li class="selected"><a href="queries.php">Queries</a></li>
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
			     <div id="mainbar_container"style="width: 830px">
				 <h4>Name:&nbsp&nbsp  <?php echo $row["name"]?></h4>
				 <h4>Email:&nbsp&nbsp  <a href="mailto:<?php echo $row['email_id']?>"><?php echo $row["email_id"]?></a></h4>
				 <h4>Subject:&nbsp&nbsp<?php echo $row["subject"]?></h4>
				 <h4>Query:</h4><p><?php echo $row["message"]?></p>				 
				 <h4>Date:<?php echo $row["Date"]?></h4>
				<form name="edit" action="deletequery.php" onsubmit="return confirm('DELETE?')"   method="post" >
				 <div class="form_settings">
				 <button name="query" type="submit" class="submit" style="float:right" value="<?php echo $row["queryno"] ?>">DELETE</button>
				 </div>
				 </form>


				 
				 </div>
			   
<?php }}else{?>
		<h2>NO Queries</h2><?php }?>
		
      </div>
       
     

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="admin_main.php">Home</a> | <a href="Bloggers.php">Bloggers</a> | <a href="new_bloggers.php">New_Bloggers</a> | <a href="queries.php">Queries</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
