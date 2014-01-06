<?php
function getBalance($user_id){
                $link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)){
                	$sum = mysql_query("SELECT SUM(amount_pay) FROM payments WHERE sender = ".$row['wallet_nxt']."");
                	$balance = mysql_result($sum, 0);
                return $balance;
                }
}

function minPriceBuy(){
                $link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM orderb",$link);
                while($row = mysql_fetch_assoc($result)){
                	$sum = mysql_query("SELECT MIN(price) FROM orderb");
                	$priceb = mysql_result($sum, 0);
                return $priceb;	
	}
}

function minPriceSell(){
                $link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM orders",$link);
                while($row = mysql_fetch_assoc($result)){
                	$sum = mysql_query("SELECT MIN(price) FROM orders");
                	$prices = mysql_result($sum, 0);
                return $prices;	
	}
}
?>