<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
$user_id = $_SESSION['id'];;
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
            <li><a href="/main.php">Home</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container" style="padding-top: 70px">
      <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered">
            <form role="form" method="POST" action="funct_add_news.php">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title">
              </div>
              <div class="form-group">
                <label>Text News</label>
                <textarea class="form-control" placeholder="Text News ..." name="news_text" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </table>
        </div>
      </div>
    </div>


    <script src="/js/jquery-1.9.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
