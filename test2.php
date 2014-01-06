<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);

$nowTime = mktime() * 1000;
$beginTime = 1385294400 * 1000;
$nowEpochTime = (($nowTime - $beginTime + 500) / 1000);
echo "Timestamp NXT: ".$nowEpochTime;

$test1 = ($nowEpochTime + 1385294400);
echo "<br>Current Timestamp: ".$test1;
?>