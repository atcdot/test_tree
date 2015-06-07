<?php
$db_host='localhost';
$db_name='test_tree';
$db_user='root';
$db_password='';

$db_connection = mysql_connect($db_host, $db_user, $db_password) or die("Не могу соединиться с MySQL.");
mysql_select_db($db_name, $db_connection) or die("Не могу подключиться к базе.");