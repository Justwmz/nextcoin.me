<?php
if (isset($_POST['login'])) {
    $passwordHash = hash('sha256', $_POST['password']);
    $login = $_POST['login']; 

include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();

    $loginerr="";
    $res = $db->getRow("SELECT * FROM users WHERE name=?s AND password=?s", $login, $passwordHash);
    // Есть ли пользователь с таким логином?
    if (count($res) == "") { 
       $loginerr.="Такого пользователя нет, или пароль не верный!";
       }
    
    echo "<b style='color:grey;'>$loginerr</b><br>"; 
    if(!$loginerr) {
        session_start();
        // Стартуем сессию и записываем логин в суперглобальный массив $_SESSION
        $_SESSION['user'] = $login;
        $_SESSION['id'] = $res['id'];


            // Если определена страница с которой мы пришли,
            // на нее и переадресуем, либо на главную
            header ("location: main.php");
        }
}    
?>
