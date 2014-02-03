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
        			<tr>
        				<td>
        					
        				</td>
        			</tr>        			
			</table>
        </div>
      </div>
    </div>
  </body>
</html>
