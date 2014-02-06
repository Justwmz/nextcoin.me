<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
$user_id = $_SESSION['id'];
include 'deposit_nxt.php';
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Sell NXT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <?php
                $users = $db->getRow("SELECT * FROM users WHERE id=?i",$user_id);
                echo("<li><a href='profile.php?id=".$users['id']."'><span class='glyphicon glyphicon-usd'></span> <span class='label label-default'>");
                echo $users['balance_usd'];
                echo("</span></a></li>");

                    $sum = $db->getRow("SELECT SUM(amount_pay) FROM payments WHERE sender = ".$users['wallet_nxt']."");
                    $sum2 = $db->getRow("SELECT SUM(amount) FROM withdraw WHERE user_id = ?i",$user_id);
                    $all_pay = $sum['SUM(amount_pay)'];
                    $all_withdraw = $sum2['SUM(amount)'];
                    $balance = $all_pay - $all_withdraw;
                echo("<li><a href='profile.php?id=".$users['id']."'><span class='glyphicon glyphicon-globe'></span> <span class='label label-default'>");
                echo $balance;        
                echo("</span></a></li>");         
            ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
                <?php
                    echo $users['name'];
                ?>
                <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                <?php
                echo("<li><a href='history.php?id=".$users['id']."'><span class='glyphicon glyphicon-list'></span> ");
                    echo "History";
                echo("</a></li>"); 
                  if($users['group'] == Administrator)
                  {
                  echo("<li><a href='/control'><span class='glyphicon glyphicon-warning-sign'></span> ");
                    echo "Control Panel";
                  }
                echo("</a></li>"); 
                ?>                             
                        </span></a></li>
                        <li><a href="chpass.php"><span class="glyphicon glyphicon-pencil"></span> Change password</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Exit</a></li>
                    </ul>
            </li>
        </ul>
        <div class="navbar-header">
          <a class="navbar-brand" href="#">NextCoin.me</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="main.php">Home</a></li>
            <li><a href="#about" data-toggle="modal" data-target="#about">About</a></li>         
            <li><a href="#faq" data-toggle="modal" data-target="#faq">FAQ</a></li>
            <li><a href="#contact" data-toggle="modal" data-target="#contact">Contact</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container" style="padding-top: 70px">
      <div class="row">
        <div class="col-md-8">
          <table class="table table-bordered">
          <?php
          $amount = $_POST['amount'];
          $price = $_POST['price'];
          $usd = $price * $amount;
                $sell_nxt = $db->query("INSERT INTO orders (price, amount, usd, status) VAlUES ($price, $amount, $usd, 1)");
                if($sell_nxt == 1){
                  echo("<div class='alert alert-success'>Операция выполнена успешно!</div>");
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
