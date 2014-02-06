<?php
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Sign In Please</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
    body {
  padding-top: 10px;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
    </head>
  <body>
   <div class="container">
    	<div class="row">
    		<div class="col-md-12">
          			<table class="table table-bordered">
          			  <tr>
          			    <td>
          			      <legend>Lates News</legend>
        							<div class="panel-group" id="accordion">
                                            <?php
                                            	 $news = $db->getAll("SELECT * FROM news");
                                            	 for($i=0;$i<count($news);$i++){
                                                  if($news[$i]['status'] == 0){
                                                echo ("<div class='panel panel-default' style='display: none;'>");
                                                  echo ("<div class='panel-heading'>");
                                                    echo ("<h4 class='panel-title'>");
                                                      echo ("<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$news[$i]['id']."'>");
                                                        echo ("<b>".$news[$i]['date']."</b> [".$news[$i]['name']."]");
                                                      echo ("</a>");
                                                    echo ("</h4>");
                                                  echo ("</div>");
                                                  echo ("<div id='collapse".$news[$i]['id']."' class='panel-collapse collapse'>");
                                                    echo ("<div class='panel-body'>");
                                                      echo $news[$i]['news_text'];
                                                    echo ("</div>");
                                                  echo ("</div>");
                                                echo ("</div>");
                                                  }
                                                  else{
                                                    echo ("<div class='panel panel-default'>");
                                                      echo ("<div class='panel-heading'>");
                                                        echo ("<h4 class='panel-title'>");
                                                          echo ("<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$news[$i]['id']."'>");
                                                            echo ("<b>".$news[$i]['date']."</b> [".$news[$i]['name']."]");
                                                          echo ("</a>");
                                                        echo ("</h4>");
                                                      echo ("</div>");
                                                      echo ("<div id='collapse".$news[$i]['id']."' class='panel-collapse collapse'>");
                                                        echo ("<div class='panel-body'>");
                                                          echo $news[$i]['news_text'];
                                                        echo ("</div>");
                                                      echo ("</div>");
                                                    echo ("</div>");
                                                    }
                                              }
                                            ?>
        							</div>
         			     </td>
         			   </tr>
         			</table>
    		</div>
    	</div>
   		<div class="row">
   			<div class="col-md-12">
   				<div class="col-md-offset-4 col-md-4">
   			<a href="#login" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#login">Sing In</a>
   			<a href="#register" class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#register">Register</a>
      			</div>
      		</div>
    	</div>
      <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered">
          <legend><center>Sell Orders</center></legend>
          <p><b>Min Price: 
          <?php
				$prices = $db->getOne("SELECT MIN(price) FROM orders");
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
                $order_sell = $db->getAll("SELECT * FROM orders");
                 for($i=0;$i<count($order_sell);$i++){
                	if($order_sell[$i]['status'] == 0){
                  		echo("<tr class='danger'>");
                  		echo("<td>".$order_sell[$i]['price']."</td>");
                  		echo("<td>".$order_sell[$i]['amount']."</td>");
                  		echo("<td>".$order_sell[$i]['usd']."</td>");
                  		echo("</tr>");
                   }
                   else{
                  		echo("<tr class='success'>");
                  		echo("<td>".$order_sell[$i]['price']."</td>");
                  		echo("<td>".$order_sell[$i]['amount']."</td>");
                  		echo("<td>".$order_sell[$i]['usd']."</td>");
                  		echo("</tr>");                   	
                   }
                }
?>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table table-bordered">
          <legend><center>Buy Orders</center></legend>
          <p><b>Max Price: 
          <?php
                $priceb = $db->getOne("SELECT MAX(price) FROM orderb");
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
                $order_buy = $db->getAll("SELECT * FROM orderb");
                 for($i=0;$i<count($order_buy);$i++){
                	if($order_buy[$i]['status'] == 0){
                  		echo("<tr class='danger'>");
                  		echo("<td>".$order_buy[$i]['price']."</td>");
                  		echo("<td>".$order_buy[$i]['amount']."</td>");
                  		echo("<td>".$order_buy[$i]['usd']."</td>");
                  		echo("</tr>");
                   }
                   else{
                  		echo("<tr class='success'>");
                  		echo("<td>".$order_buy[$i]['price']."</td>");
                  		echo("<td>".$order_buy[$i]['amount']."</td>");
                  		echo("<td>".$order_buy[$i]['usd']."</td>");
                  		echo("</tr>");                   	
                   }
                }
				?>
          </table>
        </div>
     </div>
    </div>
<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Sing In</h4>
	      </div>
	      <div class="modal-body">
			  <form class="form-signin" method="POST" role="form" action="login.php">
		        <input type="text" class="form-control" placeholder="Email address" required autofocus name="login">
		        <input type="password" class="form-control" placeholder="Password" required name="password">
		        <label class="checkbox">
		          <input type="checkbox" value="remember-me"> Remember me</label>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		      </form>
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
	        <h4 class="modal-title" id="myModalLabel">Sing in</h4>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<!-- Modal -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Register</h4>
	      </div>
	      <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="funct_register.php">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nickname</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" required placeholder="Nickname" name="nickname">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" required placeholder="Email" name="email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">NXT Wallet</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" required placeholder="NXT Wallet" name="wallet">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" required placeholder="Password" name="password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
          </form>
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
	        <h4 class="modal-title" id="myModalLabel">Register</h4>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  </body>
</html>
