<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
$user_id = $_SESSION['id'];
include 'deposit_nxt.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery.jqplot.min.css" rel="stylesheet">
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="js/jqplot.highlighter.min.js"></script>
	<script type="text/javascript" src="js/jqplot.cursor.min.js"></script>
	<script type="text/javascript" src="js/jqplot.dateAxisRenderer.min.js"></script>

    <script type="text/javascript">
	<!--	
	function validate_form_sell ( )
	{
		valid = true;

	        if(document.sell_nxt.amount.value < 100)
	        {
	        		//alert ( "Amount can't be less 100 and empty." );
	                document.getElementById('sell_alert').style.display = 'block';
	                document.sell_nxt.amount.focus();
	                valid = false;
	        }
	
	        if (document.sell_nxt.amount.value == "")
	        {
	                //alert ( "Amount can't be less 100 and empty." );
	                document.getElementById('sell_alert').style.display = 'block';
	                document.sell_nxt.amount.focus();
	                valid = false;
	        }

	       	if(document.sell_nxt.price.value == "")
	        {
	        		//alert ( "Amount can't be less 100 and empty." );
	                document.getElementById('price_alert_sell').style.display = 'block';
	                document.sell_nxt.price.focus();
	                valid = false;
	        }

	
	        return valid;
	}

  function validate_form_buy ( )
  {
    valid = true;

            if(document.buy_nxt.amount.value < 100)
          {
              //alert ( "Amount can't be less 100 and empty." );
                  document.getElementById('buy_alert').style.display = 'block';
                  document.buy_nxt.amount.focus();
                  valid = false;
          }
  
          if (document.buy_nxt.amount.value == "")
          {
                  //alert ( "Amount can't be less 100 and empty." );
                  document.getElementById('buy_alert').style.display = 'block';
                  document.buy_nxt.amount.focus();
                  valid = false;
          }

          if(document.buy_nxt.price.value == "")
          {
              //alert ( "Amount can't be less 100 and empty." );
                  document.getElementById('price_alert_buy').style.display = 'block';
                  document.buy_nxt.price.focus();
                  valid = false;
          }

  
          return valid;  
  }

	function calculate_sell()
	{
		document.getElementById('label_sell').style.display = 'block';
		document.getElementById('res_sell').innerHTML = document.sell_nxt.amount.value * document.sell_nxt.price.value;
	}	

  function calculate_buy()
  {
    document.getElementById('label_buy').style.display = 'block';
    document.getElementById('res_buy').innerHTML = document.buy_nxt.amount.value * document.buy_nxt.price.value;
  }
	//-->

	$(document).ready(function(){
	  var line1=[['23-May-08', 578.55], ['20-Jun-08', 566.5], ['25-Jul-08', 480.88], ['22-Aug-08', 509.84],
	      ['26-Sep-08', 454.13], ['24-Oct-08', 379.75], ['21-Nov-08', 303], ['26-Dec-08', 308.56],
	      ['23-Jan-09', 299.14], ['20-Feb-09', 346.51], ['20-Mar-09', 325.99], ['24-Apr-09', 386.15]];
	  var plot1 = $.jqplot('chartdiv', [line1], {
	      axes:{
	        xaxis:{
	          renderer:$.jqplot.DateAxisRenderer,
	          tickOptions:{
	            formatString:'%b&nbsp;%#d'
	          }
	        },
	        yaxis:{
	          tickOptions:{
	            formatString:'$%.2f'
	            }
	        }
	      },
	      highlighter: {
	        show: true,
	        sizeAdjust: 7.5
	      },
	      cursor: {
	        show: false
	      }
	  });
	});
	</script>

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
          <a class="navbar-brand" href="main.php">NextCoin.me</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#about" data-toggle="modal" data-target="#about">About</a></li>         
            <li><a href="#faq" data-toggle="modal" data-target="#faq">FAQ</a></li>
            <li><a href="#contact" data-toggle="modal" data-target="#contact">Contact</a></li>
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
                      			  <legend>Course</legend>
                                  <center>
                                  <div id="chartdiv" style="height:200px; width:500px;">
                                  </div>
                                  </center>
                      			      
                     			     </td>
                     			   </tr>
                     			</table>
                		</div>
                            <div class="col-md-6">
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
                    <div class="col-md-6">
                      <table class="table table-bordered">
                        <tr>
                          <td>
                            <legend><center>Sell NXT</center></legend>
                            	<div id ="sell_alert" style="display: none;" class="alert alert-danger">
                            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            		Amount can't be less 100 and empty!
                            	</div>
                            	<div id ="price_alert_sell" style="display: none;" class="alert alert-danger">
                            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            		Price can't be empty!
                            	</div>
                            <form name="sell_nxt" class="form-horizontal" role="form" method="POST" action="sell_nxt.php" onsubmit="return validate_form_sell ( );">
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
                                 <div id="label_sell" style="display: none;" class="form-group">
                                  <label class="col-sm-2 control-label">Total:</label>
                                    <div class="col-sm-8">
                                      <p id="res_sell" class="form-control-static"></p>
                                    </div>
                                 </div>
                                      <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" class="btn btn-primary">Sell NXT</button>
                                          <button type="button" class="btn btn-danger" onclick="calculate_sell();">Calculate</button>
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
                              <div id ="buy_alert" style="display: none;" class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Amount can't be less 100 and empty!
                              </div>
                              <div id ="price_alert_buy" style="display: none;" class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Price can't be empty!
                              </div>
                            <form name="buy_nxt" class="form-horizontal" role="form" method="POST" action="buy_nxt.php" onsubmit="return validate_form_buy ( );">
                              <div class="form-group">
                                <label for="inputAmount3" class="col-sm-2 control-label">Amount</label>
                                  <div class="col-sm-8">
                                   <input type="text" class="form-control" id="buyAmount" placeholder="Amount" name="amount">
                                  </div>
                              </div>
                                <div class="form-group">
                                  <label for="inputPrice" class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="buyPrice" placeholder="Price" name="price">
                                    </div>
                                </div>
                                 <div id="label_buy" style="display: none;" class="form-group">
                                  <label class="col-sm-2 control-label">Total:</label>
                                    <div class="col-sm-8">
                                      <p id="res_buy" class="form-control-static"></p>
                                    </div>
                                 </div>
                                      <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" class="btn btn-primary">Buy NXT</button>
                                          <button type="button" class="btn btn-danger" onclick="calculate_buy();">Calculate</button>
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
        $prices = $db->getOne("SELECT MIN(price) FROM orders");
                echo round($prices,4);
          ?>
          </b></p>
            <tr>
              <td>Price</td>
              <td>Amount</td>
              <td>BTC</td>
              <td></td>
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
                      echo("<td><center><button class='btn btn-info btn-xs' disabled='disabled'>Buy</button></center></td>");
                      echo("</tr>");
                   }
                   else{
                      echo("<tr class='success'>");
                      echo("<td>".$order_sell[$i]['price']."</td>");
                      echo("<td>".$order_sell[$i]['amount']."</td>");
                      echo("<td>".$order_sell[$i]['usd']."</td>");
                      echo("<td><center><button class='btn btn-info btn-xs' data-toggle='modal' data-target='#quick_buy_".$order_sell[$i]['id']."'>Buy</button></center></td>");
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
              <td>BTC</td>
              <td></td>
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
                      echo("<td><center><a href='quick_sell.php?id=".$order_buy[$i]['id']."' class='btn btn-info btn-xs' disabled='disabled'>Sell</a></center></td>");
                      echo("</tr>");
                   }
                   else{
                      echo("<tr class='success'>");
                      echo("<td>".$order_buy[$i]['price']."</td>");
                      echo("<td>".$order_buy[$i]['amount']."</td>");
                      echo("<td>".$order_buy[$i]['usd']."</td>");
                      echo("<td><center><button class='btn btn-info btn-xs' data-toggle='modal' data-target='#quick_sell_".$order_buy[$i]['id']."'>Sell</button></center></td>");
                      echo("</tr>");                    
                   }
                }
        ?>
          </table>
        </div>
     </div>
    </div>
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
  <?php
for($i=0;$i<count($order_sell);$i++){
  echo("<div class='modal fade' id='quick_buy_".$order_sell[$i]['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>");
    echo("<div class='modal-dialog'>");
      echo("<div class='modal-content'>");
        echo("<div class='modal-header'>");
          echo("<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>");
          echo("<h4 class='modal-title' id='myModalLabel'>Quick Buy NXT</h4>");
        echo("</div>");
        echo("<div class='modal-body'>");
        echo("<form role='form' method='POST' action='qbuy_nxt.php'>");
        echo("<div class='alert alert-info'>Upon clicking on 'Confirm' the transaction is processed instantly and the total price is deducted from your online cash balance!</div>");
              echo("<table class='table table-bordered'>");
              echo("<tr>");
              echo("<td><b>Id transaction</b></td>");
              echo("<td><input type='text' name='order_sell_id' value='".$order_sell[$i]['id']."' style='border: none;' readonly></td>");
              echo("<td><input type='hidden' name='order_sell_user_id' value='".$order_sell[$i]['user_id']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("<tr>");
              echo("<td><b>Price</b></td>");
              echo("<td><input type='text' name='order_sell_price' value='".$order_sell[$i]['price']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("<tr>");
              echo("<td><b>Amount NXT</b></td>");
              echo("<td><input type='text' name='order_sell_amount' value='".$order_sell[$i]['amount']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("<tr>");
              echo("<td><b>BTC</b></td>");
              echo("<td><input type='text' name='order_sell_btc' value='".$order_sell[$i]['usd']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("</table>");
        echo("</div>");
      echo("<div class='modal-footer'>");
        echo("<button type='submit' class='btn btn-primary'>Confirm</button>");
      echo("</div>");
      echo("</form>");
      echo("</div>");
    echo("</div>");
  echo("</div>");
}

for($i=0;$i<count($order_buy);$i++){
  echo("<div class='modal fade' id='quick_sell_".$order_buy[$i]['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>");
    echo("<div class='modal-dialog'>");
      echo("<div class='modal-content'>");
        echo("<div class='modal-header'>");
          echo("<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>");
          echo("<h4 class='modal-title' id='myModalLabel'>Quick Sell NXT</h4>");
        echo("</div>");
        echo("<div class='modal-body'>");
        echo("<form role='form' method='POST' action='qsell_nxt.php'>");
        echo("<div class='alert alert-info'>Upon clicking on 'Confirm' the transaction is processed instantly and the total price is deducted from your online cash balance!</div>");
              echo("<table class='table table-bordered'>");
              echo("<tr>");
              echo("<td><b>Id transaction</b></td>");
              echo("<td><input type='text' name='order_buy_id' value='".$order_buy[$i]['id']."' style='border: none;' readonly></td>");
              echo("<td><input type='hidden' name='order_buy_user_id' value='".$order_buy[$i]['user_id']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("<tr>");
              echo("<td><b>Price</b></td>");
              echo("<td><input type='text' name='order_buy_price' value='".$order_buy[$i]['price']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("<tr>");
              echo("<td><b>Amount NXT</b></td>");
              echo("<td><input type='text' name='order_buy_amount' value='".$order_buy[$i]['amount']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("<tr>");
              echo("<td><b>BTC</b></td>");
              echo("<td><input type='text' name='order_buy_btc' value='".$order_buy[$i]['usd']."' style='border: none;' readonly></td>");
              echo("</tr>");
              echo("</table>");
        echo("</div>");
      echo("<div class='modal-footer'>");
        echo("<button type='submit' class='btn btn-primary'>Confirm</button>");
      echo("</div>");
      echo("</form>");
      echo("</div>");
    echo("</div>");
  echo("</div>");
}
  ?>
  </body>
</html>
