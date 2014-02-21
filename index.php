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
    <link href="css/jquery.jqplot.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="js/jqplot.dateAxisRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqplot.categoryAxisRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqplot.canvasTextRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqplot.ohlcRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqplot.highlighter.min.js"></script>
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
    <script type="text/javascript">
  $(document).ready(function(){            
    var plot2 = $.jqplot('chartdiv',[ohlc],{
      seriesDefaults:{yaxis:'y2axis'},
      axes: {
        xaxis: {
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{formatString:'%b %e'}, 
          min: "09-01-2008",
          max: "06-22-2009",
          tickInterval: "6 weeks",
        },
        y2axis: {
          tickOptions:{formatString:'$%d'}
        }
      },
      // To make a candle stick chart, set the "candleStick" option to true.
      series: [
        {
          renderer:$.jqplot.OHLCRenderer, 
          rendererOptions:{ candleStick:true }
        }
      ],
      highlighter: {
        show: true,
        showMarker:false,
        tooltipAxes: 'xy',
        yvalues: 4,
        formatString:'<table class="jqplot-highlighter"> \
        <tr><td>date:</td><td>%s</td></tr> \
        <tr><td>open:</td><td>%s</td></tr> \
        <tr><td>hi:</td><td>%s</td></tr> \
        <tr><td>low:</td><td>%s</td></tr> \
        <tr><td>close:</td><td>%s</td></tr></table>'
      }
    });
       
  });

      ohlc = [
      ['06/15/2009 16:00:00', 136.01, 139.5, 134.53, 139.48],
      ['06/08/2009 16:00:00', 143.82, 144.56, 136.04, 136.97],
      ['06/01/2009 16:00:00', 136.47, 146.4, 136, 144.67],
      ['05/26/2009 16:00:00', 124.76, 135.9, 124.55, 135.81],
      ['05/18/2009 16:00:00', 123.73, 129.31, 121.57, 122.5],
      ['05/11/2009 16:00:00', 127.37, 130.96, 119.38, 122.42],
      ['05/04/2009 16:00:00', 128.24, 133.5, 126.26, 129.19],
      ['04/27/2009 16:00:00', 122.9, 127.95, 122.66, 127.24],
      ['04/20/2009 16:00:00', 121.73, 127.2, 118.6, 123.9],
      ['04/13/2009 16:00:00', 120.01, 124.25, 115.76, 123.42],
      ['04/06/2009 16:00:00', 114.94, 120, 113.28, 119.57],
      ['03/30/2009 16:00:00', 104.51, 116.13, 102.61, 115.99],
      ['03/23/2009 16:00:00', 102.71, 109.98, 101.75, 106.85],
      ['03/16/2009 16:00:00', 96.53, 103.48, 94.18, 101.59],
      ['03/09/2009 16:00:00', 84.18, 97.2, 82.57, 95.93],
      ['03/02/2009 16:00:00', 88.12, 92.77, 82.33, 85.3],
      ['02/23/2009 16:00:00', 91.65, 92.92, 86.51, 89.31],
      ['02/17/2009 16:00:00', 96.87, 97.04, 89, 91.2],
      ['02/09/2009 16:00:00', 100, 103, 95.77, 99.16],
      ['02/02/2009 16:00:00', 89.1, 100, 88.9, 99.72],
      ['01/26/2009 16:00:00', 88.86, 95, 88.3, 90.13],
      ['01/20/2009 16:00:00', 81.93, 90, 78.2, 88.36],
      ['01/12/2009 16:00:00', 90.46, 90.99, 80.05, 82.33],
      ['01/05/2009 16:00:00', 93.17, 97.17, 90.04, 90.58],
      ['12/29/2008 16:00:00', 86.52, 91.04, 84.72, 90.75],
      ['12/22/2008 16:00:00', 90.02, 90.03, 84.55, 85.81],
      ['12/15/2008 16:00:00', 95.99, 96.48, 88.02, 90],
      ['12/08/2008 16:00:00', 97.28, 103.6, 92.53, 98.27],
      ['12/01/2008 16:00:00', 91.3, 96.23, 86.5, 94],
      ['11/24/2008 16:00:00', 85.21, 95.25, 84.84, 92.67],
      ['11/17/2008 16:00:00', 88.48, 91.58, 79.14, 82.58],    
      ['11/10/2008 16:00:00', 100.17, 100.4, 86.02, 90.24],
      ['11/03/2008 16:00:00', 105.93, 111.79, 95.72, 98.24],
      ['10/27/2008 16:00:00', 95.07, 112.19, 91.86, 107.59],
      ['10/20/2008 16:00:00', 99.78, 101.25, 90.11, 96.38],
      ['10/13/2008 16:00:00', 104.55, 116.4, 85.89, 97.4],
      ['10/06/2008 16:00:00', 91.96, 101.5, 85, 96.8],
      ['09/29/2008 16:00:00', 119.62, 119.68, 94.65, 97.07],
      ['09/22/2008 16:00:00', 139.94, 140.25, 123, 128.24],
      ['09/15/2008 16:00:00', 142.03, 147.69, 120.68, 140.91]
    ];
    </script>
    </head>
  <body>
   <div class="container">
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
