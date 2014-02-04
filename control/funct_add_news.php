<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
$user_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Add New News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">NextCoin.me [Admin]</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container" style="padding-top: 70px">
      <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered">
          <?php
          $today = date("y-m-d");
          $link = mysql_connect('localhost','root','0rSo%232fzq12');
          if (!$link) $loginerr .="Не удалось соединиться с БД";
          mysql_select_db('nxt', $link);
          $result_news = mysql_query("INSERT INTO news (`name`, `date`, `news_text`) VALUES ('".$_POST['title']."', '".$today."', '".$_POST['news_text']."')");
            if($result_news == true)
              {
                echo("<div class='alert alert-success'>"); 
                    echo("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"); 
                    echo("News Adeed!"); 
                echo("</div>");                 
              }
              else{
                echo("<div class='alert alert-danger'>"); 
                    echo("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"); 
                    echo("Error , news can't be added!"); 
                echo("</div>");                
              }
          ?>
          </table>
        </div>
      </div>
    </div>


    <script src="/js/jquery-1.9.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
