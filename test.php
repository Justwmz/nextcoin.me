<?php
$url="http://localhost:7874/nxt?requestType=getAccountTransactionIds&account=9159366087528595444&timestamp=0";
$json = file_get_contents($url);
$Item = json_decode($json,true);

foreach ($Item['transactionIds'] as $a) {
	      $url2 = "http://localhost:7874/nxt?requestType=getTransaction&transaction=$a";
          $json2 = file_get_contents($url2);
          $obj = json_decode($json2);

		  $link = mysql_connect('localhost','root','0rSo%232fzq12');
          if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=1",$link);
                while($row = mysql_fetch_assoc($result)) {

          			if($obj->{'sender'} == $row['wallet_nxt'] ){
					mysql_query("INSERT INTO payments (user_id, amount_pay, times) VALUES (1, ".$obj->{'amount'}.",".$obj->{'timestamp'}." )",$link);
          			echo "<br>".$obj->{'amount'};
          			echo "<br>".$obj->{'timestamp'};
      	  			}
 		  }
          /*
         	Отключено до пояснения значения timestamp и его формулы.
          	echo "<br>".$obj->{'timestamp'};
          */
}
?>