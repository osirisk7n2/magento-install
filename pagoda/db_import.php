<?php 

include ('/var/www/pagoda/sql_parse_phpbb.php');

$dbms_schema = '/var/www/pagoda/magento_sample_data_for_1.6.1.0.sql';

$sql_query = @fread(@fopen($dbms_schema, 'r'), @filesize($dbms_schema)) or die('problem ');
$sql_query = remove_remarks($sql_query);
$sql_query = split_sql_file($sql_query, ';');

$host = $_SERVER["DB1_HOST"];
$user = $_SERVER["DB1_USER"];
$pass = $_SERVER["DB1_PASS"];
$db   = $_SERVER["DB1_NAME"];

mysql_connect($host,$user,$pass) or die('error connection');
mysql_select_db($db) or die('error database selection');

foreach($sql_query as $sql){
mysql_query($sql) or die('error in query');
}
?>