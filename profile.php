<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
$user_id = $_SESSION['id'];
include 'functions.php';
include 'deposit_nxt.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript">
	<!--	
  function deposit_alert()
  {
    document.getElementById('deposit_nxt_alert').style.display = 'block';
  }
	//-->
	</script>
    </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
                <?php
                /*
                  Получаем имя пользователя
                */
                $link = mysql_connect('localhost','root','0rSo%232fzq12');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {
                    echo $row['name'];
                }
                ?>
                <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                <?php
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {
                echo("<li><a href='profile.php?id=".$row['id']."'><span class='glyphicon glyphicon-usd'></span> <span class='label label-default'>");
                /*
                  Получаем баланс пользователя с кошелька USD
                */
                    echo $row['balance_usd'];
                }
                echo("</span></a></li>");   

                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {
                echo("<li><a href='profile.php?id=".$row['id']."'><span class='glyphicon glyphicon-globe'></span> <span class='label label-default'>");
                $balance = getBalance($user_id);
                echo $balance;        
                }

                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {
                echo("<li><a href='history.php?id=".$row['id']."'><span class='glyphicon glyphicon-list'></span> ");
                /*
                  Получаем баланс пользователя с кошелька USD
                */
                    echo "History";
                }
                echo("</a></li>"); 
                ?>                         
                        </span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Change password</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Exit</a></li>
                    </ul>
            </li>
        </ul>
        <div class="navbar-header">
          <a class="navbar-brand" href="main.php">NextCoin.me</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="main.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container" style="padding-top: 70px">
      <div class="row">
      		<div class="col-md-6">
				<form class="form-horizontal" role="form">
  					<div class="form-group">
  					  <label for="inputEmail3" class="col-sm-2 control-label">Username:</label>
  					  <div class="col-sm-10">
  					    <p class="form-control-static">
                			<?php
                			if (!$link) $loginerr .="Не удалось соединиться с БД";
                			mysql_select_db('nxt', $link);
                			$result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                			while($row = mysql_fetch_assoc($result)) {
                			  echo $row['name'];
                			}
                			?>  					    	
  					    </p>
  					  </div>
  					</div>
  					<div class="form-group">
  					  <label for="inputPassword3" class="col-sm-2 control-label">E-mail:</label>
  					  <div class="col-sm-10">
  					    <p class="form-control-static">
                			<?php
                			if (!$link) $loginerr .="Не удалось соединиться с БД";
                			mysql_select_db('nxt', $link);
                			$result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                			while($row = mysql_fetch_assoc($result)) {
                			  echo $row['email'];
                			}
                			?>  		  					    	
  					    </p>
  					  </div>
 					 </div>
  					<div class="form-group">
  					  <label for="inputEmail3" class="col-sm-2 control-label">Group:</label>
  					  <div class="col-sm-10">
  					    <p class="form-control-static">
                			<?php
                			if (!$link) $loginerr .="Не удалось соединиться с БД";
                			mysql_select_db('nxt', $link);
                			$result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                			while($row = mysql_fetch_assoc($result)) {
                			  echo $row['group'];
                			}
                			?>  					    	
  					    </p>
  					  </div>
  					</div>
  					<div class="form-group">
  					  <label for="inputEmail3" class="col-sm-2 control-label">NXT Wallet:</label>
  					  <div class="col-sm-10">
  					    <p class="form-control-static">
                			<?php
                			if (!$link) $loginerr .="Не удалось соединиться с БД";
                			mysql_select_db('nxt', $link);
                			$result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                			while($row = mysql_fetch_assoc($result)) {
                			  echo $row['wallet_nxt'];
                			}
                			?>  					    	
  					    </p>
  					  </div>
  					</div>
              			<div class="form-group">
              			  <div class="col-sm-offset-2 col-sm-10">
              			    <button type="submit" class="btn btn-danger" disabled="disabled">Change</button>
              			  </div>
              			</div>
				</form>
      		</div>
        <div class="col-md-6">
          <form class="form-horizontal" role="form" method="POST" action="deposit_usd.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">Balance USD</label>
              <div class="col-sm-10">
                <p class="form-control-static">
                <?php
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {
                  echo $row['balance_usd'];
                }
                ?>
                </p>
              </div>
            </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Deposit USD</button>
                </div>
              </div>
          </form>
          <br>
          <form class="form-horizontal" role="form" action=""> 
            <div class="form-group">
              <label class="col-sm-2 control-label">Balance NXT</label>
              <div class="col-sm-10">
                <p class="form-control-static">
                <?php
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=$user_id",$link);
                while($row = mysql_fetch_assoc($result)) {
                  echo $balance;
                }
                ?>
                </p>
              </div>
            </div>
                    <div id ="deposit_nxt_alert" style="display: none;" class="alert alert-info">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		For deposit to your balance pls send your NXT to wallet <b>16170476679432333849</b>
                	</div> 
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-primary" onclick="deposit_alert();">Deposit NXT</button>
                </div>
              </div>
          </form>                
        </div>
      </div>
    </div>
  </body>
</html>
