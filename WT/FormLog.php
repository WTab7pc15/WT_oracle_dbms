<?php

$email = $_POST["email"];
$passd = $_POST["pass"];
$pass=md5($passd);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$username = "pradyot";    
$password = "CMPN"; 
$database = "localhost/orcl.mshome.net";  
$query = "SELECT name FROM userss WHERE email='$email' AND pass='$pass'";
$c = oci_connect($username, $password, $database);
if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}
 
$s = oci_parse($c, $query);
if (!$s) {
    $m = oci_error($c);
    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
}
$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}

$cooki="null";
if ($s == true){

$row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS);

$cooki=$row['NAME'];

echo "<script type='text/javascript'>alert('logged in '".$cooki." 'not');</script>";

}

else {
echo "not";
  echo "<script type='text/javascript'>alert('error in log');</script>";
}

echo "<script type='text/javascript'>document.cookie = 'user=".$cooki."';</script>";

header('refresh:0;url= HomePage/');
oci_close($conn);
?>