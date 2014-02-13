<?php                
                $oper = $db->getAll("SELECT * FROM history WHERE user_id = ?i",$user_id);
                $summ_ordersell_nxt = 0;
                $summ_ordersell_btc = 0;
                $summ_orderbuy_nxt = 0;
                $summ_orderbuy_btc = 0;
                for($i = 0; $i<count($oper);$i++)
                {
                  if($oper[$i]['order_id'] == 1)
                  {
                    $summ_ordersell_nxt += $oper[$i]['amount_nxt'];
                    $summ_ordersell_btc += $oper[$i]['amount_btc'];
                  }
                  if($oper[$i]['order_id'] == 2)
                  {
                    $summ_orderbuy_nxt += $oper[$i]['amount_nxt'];
                    $summ_orderbuy_btc += $oper[$i]['amount_btc'];
                  }    
                }
                $users = $db->getRow("SELECT * FROM users WHERE id=?i",$user_id);
                $btc = $db->getRow("SELECT SUM(value) FROM btc_payments WHERE user_id = ?i",$user_id);
                $btc_withdraw = $db->getRow("SELECT SUM(amount) FROM withdraw WHERE user_id = ?i AND tr_id = 2",$user_id);
                echo("<li><a href='profile.php?id=".$users['id']."'><span class='glyphicon glyphicon-usd'></span> <span class='label label-default'>");
                $balance_btc = ($btc['SUM(value)'] + $summ_ordersell_btc) - ($summ_orderbuy_btc - ($btc_withdraw['SUM(amount)'] / 100000000));
                echo round($balance_btc,4);
                echo("</span></a></li>");

                    $sum = $db->getRow("SELECT SUM(amount_pay) FROM payments WHERE sender = ".$users['wallet_nxt']."");
                    $sum2 = $db->getRow("SELECT SUM(amount) FROM withdraw WHERE user_id = ?i AND tr_id = 1",$user_id);
                    $all_pay = $sum['SUM(amount_pay)'];
                    $all_withdraw = $sum2['SUM(amount)'];
                    $balance_nxt = $all_pay - ($all_withdraw + $users['holdings'] + $summ_orderbuy_nxt) + $summ_orderbuy_nxt;
                echo("<li><a href='profile.php?id=".$users['id']."'><span class='glyphicon glyphicon-globe'></span> <span class='label label-default'>");
                echo $balance_nxt;        
                echo("</span></a></li>"); 
                echo("<li><a href='profile.php?id=".$users['id']."'><span class='glyphicon glyphicon-lock'></span> <span class='label label-default'>");
                echo $users['holdings'];        
                echo("</span></a></li>");
?>