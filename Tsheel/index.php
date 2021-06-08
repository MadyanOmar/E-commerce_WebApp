<!DOCTYPE html>
<html>
	<head>
		<title>Tsheel</title>
		<link href="styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header>
			<form action="process.php" method="post">
				<h1>Login</h1>
				<hr>
				<h3>Welcome to Tsheel</h3>
				<?php
					if(@$_GET['AccountStatus']==true and @$_GET['AccountStatus']=="success")
					{
						echo "<p style=\"color: green; text-decoration: underline;\">Account Successfully Created</p>";
					}
					if(@$_GET['AccountStatus']==true and @$_GET['AccountStatus']=="NotAvailable")
					{
						echo "<p style=\"color: red; text-decoration: underline;\">Wrong account provided. Please sign up!</p>";
					}
				?>
				<p><input type="text" name="username" placeholder="Username"></p>
				<p><input type="password" name="password" placeholder="Password"></p>
				<p><button type="submit">Login</button></p>
				<br>
				<p style="margin-bottom: 20px;"><a href="signup.php">Dont have an account yet?<br>Click here to sign up!</a></p>
			</form>
		</header>
	</body>
</html>