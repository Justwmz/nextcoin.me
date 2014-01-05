
<!DOCTYPE html>
<html>
  <head>
    <title>NextCoin.me | Sign In Please</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
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

      <?php
      echo("<form class='form-signin' method='POST' role='form' action='login.php'>");
        echo("<h2 class='form-signin-heading'>Please sign in</h2>");
        echo("<input type='text' class='form-control' placeholder='Email address' required autofocus name='login'>");
        echo("<input type='password' class='form-control' placeholder='Password' required name='password'>");
        echo("<label class='checkbox'>");
          echo("<input type='checkbox' value='remember-me'> Remember me</label>");
        echo("<button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>");
      echo("</form>");
      ?>

    </div>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
