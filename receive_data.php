<?php
include ("connect_db.php");

$item_id = $_POST['item_id'];

$result = mysql_query('SELECT * FROM `tree` WHERE `parent_id` ='.$item_id);
$rows = array();
while($row = mysql_fetch_assoc($result)) {
    $rows[] = $row;
}
return print_r(json_encode($rows));
