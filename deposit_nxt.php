<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}

$user_id = $_SESSION['id'];


  $url="http://localhost:7874/nxt?requestType=getAccountTransactionIds&account=13909801773525658690&timestamp=0";
  $json = file_get_contents($url);
  $Item = json_decode($json,true);
  
  foreach ($Item['transactionIds'] as $a) {
          $url2 = "http://localhost:7874/nxt?requestType=getTransaction&transaction=$a";
            $json2 = file_get_contents($url2);
            $obj = json_decode($json2);
  
        $link = mysql_connect('localhost','root','0rSo%232fzq12');
            if (!$link) $loginerr .="Не удалось соединиться с БД";
                  mysql_select_db('nxt', $link);
                  $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                  while($row = mysql_fetch_assoc($result)) {
  
                  if($obj->{'sender'} == $row['wallet_nxt'] ){
                          //echo "<br>".$obj->{'amount'};
                          //echo "<br>".$obj->{'timestamp'};
                          mysql_query("INSERT INTO payments (user_id, amount_pay, times, sender) VALUES (".$user_id.", ".$obj->{'amount'}.",".$obj->{'timestamp'}.",".$obj->{'sender'}." )",$link);
                  }
         }
  }
?>
