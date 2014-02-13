<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
$user_id = $_SESSION['id'];
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
include 'deposit_nxt.php';
include 'lib/config_btc.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Withdraw BTC</title>
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
            <script type="text/javascript">
            <!--  
            function withdraw()
            {
              valid = true;
              var a = <?php echo $balance_btc; ?>;

                    if(document.withdraw_form.amount.value > a)
                    {
                        //alert ( "Amount can't be less 100 and empty." );
                            document.getElementById('withdraw_alert').style.display = 'block';
                            document.withdraw_form.amount.focus();
                            valid = false;
                    }

                return valid;
            }
            //-->
            </script> 
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
          <form name="withdraw_form" class="form-horizontal" role="form" method="POST" onsubmit="return withdraw();" action="funct_withdraw_btc.php">
          <div class="alert alert-info">Withdraw to your bitcoin address. All transactions include a 0.0005 BTC miners fee!</b></div>
              <div id ="withdraw_alert" class="alert alert-danger" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Can't be more then your balance. Your balance is <b><?php echo $balance_btc; ?></b>
              </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Amount</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Amount" name="amount">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Bitcoin Addres</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Bitcoin Address" name="address">
              </div>
            </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
          </form>
        </div>
      </div>



    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <!-- Modal -->
  <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">About</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- Modal -->
  <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">FAQ</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- Modal -->
  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Contact</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </body>
</html>
