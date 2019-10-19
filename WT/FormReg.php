<?php

$name = $_POST["RName"];
$age = $_POST["Rage"];
$tele = $_POST["Rtele"];
$email = $_POST["Remail"];
$passd = $_POST["Rpass"];
$pass=md5($passd);

error_reporting(E_ALL);
ini_set('display_errors', 'On');
 
$username = "pradyot";    
$password = "CMPN"; 
$database = "localhost/orcl.mshome.net";  
 
$query = "INSERT INTO userss (name,age,telephone,email,pass)
VALUES ('$name','$age','$tele','$email','$pass')";

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

if ($r === TRUE) {
    echo "<script type='text/javascript'>alert('User Registered !');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $m;
}


header('refresh:0;url= HomePage/');
oci_close($conn);
?>
