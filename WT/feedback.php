<?php

$sub = $_POST["subject"];
$msg = $_POST["message"];
$name = $_COOKIE["user"];

$username = "pradyot";    
$password = "CMPN"; 
$database = "localhost/orcl.mshome.net";  

$conn = oci_connect($username, $password, $database);
if (!$conn) {
  $m = oci_error();
  trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}

$sql = "INSERT INTO user_feedback (name,sub,feedback) VALUES ('$name','$sub','$msg')";

$s = oci_parse($conn, $sql);
if (!$s) {
    $m = oci_error($conn);
    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
}

$r = oci_execute($s);
if ($r) {
      echo "<script type='text/javascript'>alert('Feedback Registered !');</script>";
      echo "done";
}
else {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}

oci_close($conn);

header('refresh:0;url= HomePage/');

?>
