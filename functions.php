<?php
function getBalance($user_id){
                $link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)){
                	$sum = mysql_query("SELECT SUM(amount_pay) FROM payments WHERE sender = ".$row['wallet_nxt']."");
                        $sum2 = mysql_query("SELECT SUM(amount) FROM withdraw WHERE user_id = $user_id");
                	$all_pay = mysql_result($sum, 0);
                        $all_withdraw = mysql_result($sum2, 0);
                        $balance = $all_pay - $all_withdraw;
                return $balance;
                }
}

function maxPriceBuy(){
                $link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM orderb",$link);
                while($row = mysql_fetch_assoc($result)){
                	$sum = mysql_query("SELECT MAX(price) FROM orderb");
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