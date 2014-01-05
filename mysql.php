<?
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'powerboard35';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'nxt';
mysql_select_db($dbname);
?>