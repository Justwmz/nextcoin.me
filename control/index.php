<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: /index.php");
}
$user_id = $_SESSION['id'];

        		$link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {
                	if($row['group'] == User)
                		  header ("location: /main.php");
                	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Control Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">NextCoin.me [Admin]</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/main.php">Home</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container" style="padding-top: 70px">
      <div class="row">
        <div class="col-md-6">
        	<table class="table table-striped">
                <legend>Users</legend>
                <p><b>Count: 2</b></p>
        			<tr>
        				<td>Id</td>
        				<td>Name</td>
        				<td>Group</td>
        				<td>E-mail</td>
        				<td>NXT Wallet</td>
        			</tr>
        			<?php 
                			if (!$link) $loginerr .="Не удалось соединиться с БД";
                			mysql_select_db('nxt', $link);
                            $result = mysql_query("SELECT * FROM users",$link);
                            while($row = mysql_fetch_assoc($result)) {
                              		echo("<tr>");
                              		echo("<td>".$row['id']."</td>");
                              		echo("<td>".$row['name']."</td>");
                              		echo("<td>".$row['group']."</td>");
                              		echo("<td>".$row['email']."</td>");
                              		echo("<td>".$row['wallet_nxt']."</td>");
                              		echo("</tr>");
                               }
        			?>
			</table>
        </div>
        <div class="col-md-6">
        	<table class="table table-striped">
                <legend>Loging System</legend>
        			<tr>
        				<td>Файл</td>
        			</tr>  
        			<?php 
					$dir = "/var/www/next/log/";   //задаём имя директории
						if(is_dir($dir)) {   //проверяем наличие директории
							         $files = scandir($dir);    //сканируем (получаем массив файлов)
							         array_shift($files); // удаляем из массива '.'
							         array_shift($files); // удаляем из массива '..'
							         for($i=0; $i<sizeof($files); $i++) {
							         echo ("<tr><td><a href=/log/".$files[$i]." title='открыть/скачать файл или страницу'>".$files[$i]."</a></td></tr>");
							         }  //выводим все файлы
							    } 
        			?>       			
			</table>
        </div>
      </div>
        <div class="row">
          <div class="col-md-6">
              <table class="table table-bordered">
                    <legend>News</legend>
                    <p><b>Count: 2</b></p>
                      <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Date</td>
                        <td>Status</td>
                      </tr>
                      <?php
                      if (!$link) $loginerr .="Не удалось соединиться с БД";
                      mysql_select_db('nxt', $link);
                            $result = mysql_query("SELECT * FROM news",$link);
                            while($row = mysql_fetch_assoc($result)) {
                              if($row['status'] == 0)
                                  {
                                  echo("<tr class='alert alert-danger'>");
                                  echo("<td>".$row['id']."</td>");
                                  echo("<td>".$row['name']."</td>");
                                  echo("<td>".$row['date']."</td>");
                                  echo("<td><center><a class='btn btn-success' href='funct_status.php?id=".$row['id']."&status=1'>Activate</a></center></td>");
                                  echo("</tr>");
                                  }
                                  else
                                      {
                                      echo("<tr class='alert alert-success'>");
                                      echo("<td>".$row['id']."</td>");
                                      echo("<td>".$row['name']."</td>");
                                      echo("<td>".$row['date']."</td>");
                                  	  echo("<td><center><a class='btn btn-danger' href='funct_status.php?id=".$row['id']."&status=0'>Deactivate</a></center></td>");
                                      echo("</tr>");                                        
                                      }
                               }
                      ?>
              </table>
              <a class="btn btn-primary" href="add_news.php">Add New</a>
          </div>
        </div>
    </div>
  </body>
</html>
