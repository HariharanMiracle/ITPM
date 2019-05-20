<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>ACS E-Learning</title>
  <link rel="stylesheet" href="../scss/style.css">
   <link rel="icon" type="image/png"  href="../images/favicon.png">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">

    <div class="login">
      <h1>Student</h1>
      <form method="post" action="../functions/user_login.php">
        <p><input type="text" name="username" value="" placeholder="admin"></p>
        <p><input type="password" name="password" value="" placeholder="*****"></p>
        
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Not a Member? <a href="signup.php">Register here!</a>.</p>
    </div>
   
  </section>

</body>
</html>
