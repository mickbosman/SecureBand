<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Ma-gram</title>
  <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Naam</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Wachtwoord</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Nog geen account? <a href="register.php">Maak account</a>
  	</p>
  </form>
</body>
</html>