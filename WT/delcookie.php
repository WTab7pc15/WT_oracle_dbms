<?php
if(!isset($_COOKIE["user"])) {

} else {
setcookie("user","",time() - (86400 * 30));
}

header('refresh:0; url= ../HomePage/');
exit;

?>
