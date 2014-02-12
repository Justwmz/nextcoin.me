<?php
$transaction_hash = $_GET['transaction_hash'];
$value_in_btc = $_GET['value'] / 100000000;
$address = $_GET['destination_address'];
$my_address = "1LXMUa32niJXP2LCQ8dXG94u55CitDPucy";
//Commented out to test, uncomment when live

if ($address == $my_address) {
    echo "*ok*";
  return;
}

echo $address . ' received a payment of ' . $value_in_btc . ' transaction hash ' . $transaction_hash;
?>