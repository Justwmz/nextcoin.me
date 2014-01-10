?>
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="main.php">NextCoin.me</a>
        </div>
        <div class="navbar-collapse collapse">
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container" style="padding-top: 70px">
      <div class="row">
        <div class="col-md-6">
        <legend><center>Register</center></legend>
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
      </div>
    </div>
  </body>
</html>
