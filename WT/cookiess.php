<?php

setcookie("user","Atharva",time() + (86400 * 30))

?>

<?php
if(!isset($_COOKIE["user"])) 
{
echo "Cookie named '" . "' is not set!";
} else
 {
echo "Cookie '" . "' is set!";
echo "Value is: " . $_COOKIE["user"];
echo "<script type='text/javascript'>alert('We welcome the New World'.$cookie);</script>";
}
header('refresh:0; url= ../HomePage/');
exit;

?>