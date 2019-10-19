<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) 
{
    $query ="SELECT data FROM searchdata WHERE UPPER(data) like UPPER('" . $_POST["keyword"] . "%') AND ROWNUM <= 6";
    $result = $db_handle->runQuery($query);
    if(!empty($result)) 
    {
        ?>
        <ul  style="list-style: none; padding: 0;" id="list">
        <?php
        foreach($result as $name) 
        {
            if(stripos($name['DATA'], $_POST["keyword"]) !== false)
            {
                ?>
                <li onClick="selectName('<?php echo $name['DATA']; ?>');"><?php echo $name['DATA']; ?></li>
                <?php
            }
            ?>
            <?php 
        } ?>
        </ul>
        <?php 
    } 
} ?>
