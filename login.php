<?php
//include 'mysql.php';
if (isset($_POST['login'])) {
    $passwordHash = md5($_POST['password']);
    $login = $_POST['login']; 

    $loginerr="";
    // Проверка логина на плохие смиволы
    if (!preg_match("/^\w{3,}$/", $login)) $loginerr .="Неправильный логин!";
    $link = mysql_connect('localhost','root','0rSo%232fzq12');
    if (!$link) $loginerr .="Не удалось соединиться с БД";
    mysql_select_db('nxt', $link);
    $res = mysql_query("SELECT * FROM users WHERE name='$login'AND password='$passwordHash'", $link);
    // Есть ли пользователь с таким логином?
    if (mysql_num_rows($res) < 1) { 
       $loginerr.="Такого пользователя нет, или пароль не верный!";mysql_close($link);
       }
    
    header('Content-Type: text/html; charset= utf-8');
    echo "<b style='color:grey;'>$loginerr</b><br>"; 
    if(!$loginerr) {
        // Стартуем сессию и записываем логин в суперглобальный массив $_SESSION
        session_start();
        $_SESSION['user'] = $login;
        mysql_close($link);
        // Если определена страница с которой мы пришли,
        // на нее и переадресуем, либо на главную
        header ("location: main.php");
        /*if (isset($_SERVER['HTTP_REFERER'])) {
        header ("location: ".$_SERVER['HTTP_REFERER']);
        }
        else {
        header ("location: index.php");
        }*/
    }    
}
?>
