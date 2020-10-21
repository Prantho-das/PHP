<?php
session_start();
if (isset($_SESSION['id'])) {
	header('location:index.php?signup');
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
			include "class/class.php";
			$db = new database();
			if (isset($_REQUEST['submit'])) {
				$un = $_POST['username'];
				$ps = $_POST['password'];
				if (!empty($un) && !empty($ps)) {
					$login = $db->login($un, $ps);
				} else {
					echo '<h1>Please Fill Up The Field</h1>';
				}
			}


			?>
			<form action="" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required="" name="username" />
				</div>
				<div>
					<input type="text" placeholder="Password" required="" name="password" />
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