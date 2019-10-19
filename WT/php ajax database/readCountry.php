<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM name WHERE s_name like '" . $_POST["keyword"] . "%' ORDER BY s_name LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["s_name"]; ?>');"><?php echo $country["s_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>
