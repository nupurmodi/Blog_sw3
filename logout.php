<?php
session_start();
?><?php
echo "<script>var r=confirm('Do you want to logout? ');
if(r==true){<?php header('refresh:0;url=logout2.php');?>}
else{<?php header('Location: ' . $_SERVER['HTTP_REFERER']);?>}
</script>";?>






