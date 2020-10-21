<?php
    if(isset($_COOKIE['name'])){
      header('location:index.php');
    }
    ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php 
        include "../lib/Database.php";
        include "../helpers/help.php";
        $help = new help();
        $db = new database();
		if(isset($_REQUEST['submit'])){
			$username=$_REQUEST['username'];
			$password=md5($_REQUEST['password']);
			$logq="SELECT * FROM `user` WHERE email='$username' AND password='$password'";
			$log=$db->login($logq,$username);
		}
		?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>