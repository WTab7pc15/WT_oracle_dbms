<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="INSERT into bookings (Time,Statement,Price,hotel_name,user_id) VALUES ('".$_POST['time'] ."','".$_POST['statement']."', ".$_POST['price'].", '".$_POST['h_name']."', '".$_COOKIE['user']."')";
$result = $db_handle->runQuery($query);
?>