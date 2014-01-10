<?php
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$wallet = $_POST['wallet'];
$password = md5($_POST['password']);
$link = mysql_connect('localhost','root','0rSo%232fzq12');
    if (!$link) $loginerr .="Не удалось соединиться с БД";
                            mysql_select_db('nxt', $link);
mysql_query("INSERT INTO users (name, email, wallet_nxt, password) VALUES ('".$nickname."', '".$email."', '".$wallet."', '".$password."')",$link);
sleep(2);
header ("location: index.php");
?>