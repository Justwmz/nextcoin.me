<?php
/*include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
function getBalance($user_id){
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)){
                	$sum = mysql_query("SELECT SUM(amount_pay) FROM payments WHERE sender = ".$row['wallet_nxt']."");
                        $sum2 = mysql_query("SELECT SUM(amount) FROM withdraw WHERE user_id = $user_id");
                	$all_pay = mysql_result($sum, 0);
                        $all_withdraw = mysql_result($sum2, 0);
                        $balance = $all_pay - $all_withdraw;
                return $balance;
                }
}*/
?>