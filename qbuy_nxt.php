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
    <title>NextCoin.me | Quick Buy NXT</title>
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
            include 'include/balance.php';        
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
          $id_tr = $_POST['order_sell_id'];
          $user_sell_id = $_POST['order_sell_user_id'];
          $usd = $_POST['order_sell_btc'];
          $amount= $_POST['order_sell_amount'];
          if ($usd > $btc['SUM(value)'])
          {
            echo("<div class='alert alert-danger'>Operation can not be executed because you are not enough funds!</div>");
          }
          else{
                $order_sell = $db->query("UPDATE orders SET status = 0 WHERE id = ?i ",$id_tr);
                $holdings_user = $db->query("UPDATE users SET holdings = holdings - $amount WHERE id = ?i ",$user_sell_id);
                $user1 = $db->query("INSERT INTO history (tr_id, user_id, user_id_2, order_id, amount_nxt, amount_btc) VALUES ($id_tr, $user_id, $user_sell_id, 1, $amount, $usd)");
                $user2 = $db->query("INSERT INTO history (tr_id, user_id, user_id_2, order_id, amount_nxt, amount_btc) VALUES ($id_tr, $user_id, $user_sell_id, 2, $amount, $usd)");
                if($order_sell == 1){
                  echo("<div class='alert alert-success'>Операция выполнена успешно!</div>");
                }
                  else{
                    echo("<div class='alert alert-danger'>Операция невыполнена успешно!</div>");
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
