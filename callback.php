<?php
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();

$my_address = "1LXMUa32niJXP2LCQ8dXG94u55CitDPucy";
$secret = "0rSo%232fzq12";

$user_id = $_GET['user_id'];
$transaction_hash = $_GET['transaction_hash'];
$value_in_btc = $_GET['value'] / 100000000;

//Commented out to test, uncomment when live
if ($_GET['address'] != $my_address) {
    echo 'Incorrect Receiving Address';
  return;
}

if ($_GET['secret'] != $secret) {
  echo 'Invalid Secret';
  return;
}

  //Add the invoice to the database
  $result = $db->query("INSERT INTO `btc_payments` (`user_id`, `transaction_hash`, `value`) values($user_id, $transaction_hash, $value_in_btc)");

  if($result) {
	   echo "*ok*";
     return;
  }
?>
