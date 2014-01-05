<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
                $result = mysql_query("SELECT * FROM users WHERE id=1",$link);
                while($row = mysql_fetch_assoc($result)) {
                    echo $row['name'];
                }
                ?>
                <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                <?php
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=1",$link);
                while($row = mysql_fetch_assoc($result)) {
                echo("<li><a href='profile.php?id=".$row['id']."'><span class='glyphicon glyphicon-usd'></span> <span class='label label-default'>");
                /*
                  Получаем баланс пользователя с кошелька USD
                */
                    echo $row['balance_usd'];
                }
                echo("</span></a></li>");   

                        //<li><a href="#"><span class="glyphicon glyphicon-globe"></span> <span class="label label-default">
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=1",$link);
                while($row = mysql_fetch_assoc($result)) {
                echo("<li><a href='profile.php?id=".$row['id']."'><span class='glyphicon glyphicon-globe'></span> <span class='label label-default'>");
                /*
                  1.Получаем баланс пользователя с кошелька NXT
                  2.Отключено по мере не надобности(Информация о балансе)
                */
                //$url = "http://localhost:7874/nxt?requestType=getBalance&account=".$row['wallet_nxt']."";
                //$json = file_get_contents($url);
                //$obj = json_decode($json);
                //print $obj->{'balance'}/100;
                echo $row['balance_nxt'];
                /*
                  Выключено до выяснения места установки
                  if ($row['balance_nxt'] == 0)
                    {
                      echo("<div class='alert alert-warning alert-dismissable'>");
                          echo("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
                          echo("<strong>Warning!</strong> Best check yo self, you're not looking too good.");
                      echo("</div>");
                    }
                */          
                }

                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=1",$link);
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
                        <li><a href="#"><span class="glyphicon glyphicon-off"></span> Exit</a></li>
                    </ul>
            </li>
        </ul>
        <div class="navbar-header">
          <a class="navbar-brand" href="#">NextCoin.me</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
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
              <label class="col-sm-2 control-label">Balance USD</label>
              <div class="col-sm-10">
                <p class="form-control-static">10000</p>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Deposit USD</button>
          </form>
          <br>
          <form class="form-horizontal" role="form" action="deposit_nxt.php"> 
            <div class="form-group">
              <label class="col-sm-2 control-label">Balance NXT</label>
              <div class="col-sm-10">
                <p class="form-control-static">
                <?php
                $link = mysql_connect('localhost','root','powerboard35');
                if (!$link) $loginerr .="Не удалось соединиться с БД";
                mysql_select_db('nxt', $link);
                $result = mysql_query("SELECT * FROM users WHERE id=1",$link);
                while($row = mysql_fetch_assoc($result)) {
                  echo $row['balance_nxt'];
                }
                ?>
                </p>
              </div> 
            </div>
            <button type="submit" class="btn btn-primary">Deposit NXT</button>
          </form>                
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
