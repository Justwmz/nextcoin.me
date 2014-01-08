<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
$user_id = $_SESSION['id'];
include 'functions.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
	<!--
	
	function validate_form ( )
	{
		valid = true;
	
	        if ( document.sell_nxt.amount.value < 100 &&  document.sell_nxt.amount.value == "")
	        {
	                //alert ( "Amount can't be less 100 and empty." );
	                document.getElementById('sell_alert').style.display = 'block';
	                document.sell_nxt.amount.focus();
	                valid = false;
	        }

	
	        return valid;
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
          <a class="navbar-brand" href="#">NextCoin.me</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="main.php">Home</a></li>
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
          <table class="table table-bordered">
            <tr>
              <td>
                <legend><center>Sell NXT</center></legend>
                	<div id ="sell_alert" style="display: none;" class="alert alert-danger">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Amount can't be less 100 and empty!
                	</div>
                <form name="sell_nxt" class="form-horizontal" role="form" method="POST" action="sell_nxt.php" onsubmit="return validate_form ( );">
                  <div class="form-group">
                    <label for="inputAmount3" class="col-sm-2 control-label">Amount</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="inputAmount3" placeholder="Amount" name="amount">
                      </div>
                  </div>
                    <div class="form-group">
                      <label for="inputPrice" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputPrice3" placeholder="Price" name="price">
                        </div>
                    </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Sell NXT</button>
                              <button type="button" class="btn btn-danger" disabled="disabled">Calculate</button>
                            </div>
                          </div>
                  </form>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table table-bordered">
            <tr>
              <td>
                <legend><center>Buy NXT</center></legend>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputAmount3" class="col-sm-2 control-label">Amount</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="inputAmount3" placeholder="Amount">
                      </div>
                  </div>
                    <div class="form-group">
                      <label for="inputPrice" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputPrice3" placeholder="Price">
                        </div>
                    </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary" disabled="disabled">Buy NXT</button>
                              <button type="button" class="btn btn-danger" disabled="disabled">Calculate</button>
                            </div>
                          </div>
                  </form>
              </td>
            </tr>
          </table>
        </div>
     </div>
      <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered">
          <legend><center>Sell Orders</center></legend>
          <p><b>Min Price: 
          <?php
                $prices = minPriceSell();
                echo round($prices,4);
          ?>
          </b></p>
            <tr>
              <td>Price</td>
              <td>Amount</td>
              <td>USD</td>
            </tr>
<?php
/*
  Устанавливаем соединение с базой , после чего вытаскиваем данные и проверяем статус.
*/
    			if (!$link) $loginerr .="Не удалось соединиться с БД";
    			mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM orders",$link);
                while($row = mysql_fetch_assoc($result)) {
                	if($row['status'] == 0){
                  		echo("<tr class='danger'>");
                  		echo("<td>".$row['price']."</td>");
                  		echo("<td>".$row['amount']."</td>");
                  		echo("<td>".$row['usd']."</td>");
                  		echo("</tr>");
                   }
                   else{
                  		echo("<tr class='success'>");
                  		echo("<td>".$row['price']."</td>");
                  		echo("<td>".$row['amount']."</td>");
                  		echo("<td>".$row['usd']."</td>");
                  		echo("</tr>");                   	
                   }
                }
?>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table table-bordered">
          <legend><center>Buy Orders</center></legend>
          <p><b>Min Price: 
          <?php
                $priceb = minPriceBuy();
                echo round($priceb,4);
          ?>
          </b></p>
            <tr>
              <td>Price</td>
              <td>Amount</td>
              <td>USD</td>
            </tr>
				<?php
/*
  Устанавливаем соединение с базой , после чего вытаскиваем данные и проверяем статус.
*/
    			if (!$link) $loginerr .="Не удалось соединиться с БД";
    			mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM orderb",$link);
                while($row = mysql_fetch_assoc($result)) {
                	if($row['status'] == 0){
                  		echo("<tr class='danger'>");
                  		echo("<td>".$row['price']."</td>");
                  		echo("<td>".$row['amount']."</td>");
                  		echo("<td>".$row['usd']."</td>");
                  		echo("</tr>");
                   }
                   else{
                  		echo("<tr class='success'>");
                  		echo("<td>".$row['price']."</td>");
                  		echo("<td>".$row['amount']."</td>");
                  		echo("<td>".$row['usd']."</td>");
                  		echo("</tr>");                   	
                   }
                }
				?>
          </table>
        </div>
     </div>
    </div>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
