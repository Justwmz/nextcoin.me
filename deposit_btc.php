<?php
include 'lib/config_btc.php';
$my_callback_url = 'https://nextcoin.me/callback.php?user_id=1&secret='.$secret;
$root_url = 'https://blockchain.info/api/receive';
$parameters = 'method=create&address=' . $my_address .'&callback='. urlencode($my_callback_url);
$response = file_get_contents($root_url . '?' . $parameters);
$object = json_decode($response);
echo 'Send Payment To : ' . $object->input_address;
?>