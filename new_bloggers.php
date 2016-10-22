
<?php
session_start();
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
          <li><a href="Bloggers.php">Bloggers</a></li>
		  <li class="selected"><a href="new_bloggers.php">New_Bloggers</a></li>
          <li><a href="queries.php">Queries</a></li>
		  <li ><a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	 
    <div id="content_header"></div>
    <div id="site_content">
	 <?php
echo "<form method='post' action='addblogger.php'>";

$handle = @fopen("blogger.txt", "r");
echo '<table style="width:100%; border-spacing:0;">';
if ($handle)
{ echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";
echo"<tr>";
echo"<th>First_Name</th>";
echo"<th>Last_Name</th>";
echo"<th>Email</th>";
echo"<th>Gender</th>";
echo"<th>Password</th>";
echo"</tr>";
    while (!feof($handle))
    {  $matches=array();
        $buffer = fgets($handle);
		
		$str=preg_replace('/\s++/','',$buffer);
        //if(strpos($buffer, $searchthis) !== FALSE)
          //  $matches[] = $buffer;
	 // echo $buffer;
	 $matches=explode(',',$str);
	 if(empty($matches[1])){
		 continue;
	 }
	 	echo"<tr>";
	 echo"<td><input type='checkbox' value='$str' name='First_Name[]'>";
	 echo"$matches[0]</td>";
	echo"<td>$matches[1]</td>";
	echo"<td>$matches[2]</td>";
	echo"<td>$matches[3]</td>";
	echo"<td>$matches[4]</td>";
	echo"</tr>";
    }
	echo"</table><br/>";
    fclose($handle);
	echo "<input type='submit' value='ADD_blogger'>";
}
echo"</form>";

//show results:
//print_r($matches);

?>
	  
	 
    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="admin_main.php">Home</a> | <a href="Bloggers.php">Bloggers</a> | <a href="new_bloggers.php">New_Bloggers</a> | <a href="queries.php">Queries</a> |<a href="logout2.php" onclick="return confirm('Do you want to logout? ');">Logout</a>|</p>
     
    </div>
  </div>
</body>
</html>
