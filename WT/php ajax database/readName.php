<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM name WHERE s_name like '" . $_POST["keyword"] . "%' ORDER BY s_name LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="list">
<?php
foreach($result as $name) {
?>
<li onClick="selectName('<?php echo $name["s_name"]; ?>');"><?php echo $name["s_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>
