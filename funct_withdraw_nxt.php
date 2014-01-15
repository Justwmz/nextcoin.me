<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
$user_id = $_SESSION['id'];

                $link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {


$secret = "sD3JmKLY16pALiSXsElbeySm1y49N9iC1JgkTz2uMAiKs7rf5BGM11FubBpm";
$url = "http://localhost:7874/nxt?requestType=sendMoney&secretPhrase=".$secret."&recipient=".$row['wallet_nxt']."&amount=".$_POST['amount']."&fee=1&deadline=5";
  $json = file_get_contents($url);
  $Item = json_decode($json);
  mysql_query("INSERT INTO withdraw (user_id, amount, id_transaction) VALUES (".$user_id." , ".$_POST['amount'].", ".$Item->transaction.")",$link)
                }
                sleep(2);
  header ("location: profile.php?id=".$user_id."");

?>