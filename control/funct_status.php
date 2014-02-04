<?php
          $link = mysql_connect('localhost','root','0rSo%232fzq12');
          if (!$link) $loginerr .="Не удалось соединиться с БД";
          mysql_select_db('nxt', $link);
          $result_news = mysql_query("UPDATE news SET status = '".$_GET['status']."' WHERE (id = '".$_GET['id']."')");
          header("Location: ".$_SERVER['HTTP_REFERER']);
?>