<?php
$url="http://localhost:7874/nxt?requestType=getAccountTransactionIds&account=3642025151018909259&timestamp=1440";
$json = file_get_contents($url);
$Item = json_decode($json,true);

foreach ($Item['transactionIds'] as $a) {
	      $url2 = "http://localhost:7874/nxt?requestType=getTransaction&transaction=$a";
          $json2 = file_get_contents($url2);
          $obj = json_decode($json2);
          echo "<br>".$obj->{'sender'};

}
?>
