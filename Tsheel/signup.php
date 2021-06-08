<html>
	<head>
		<title>Tsheel</title>
		<link href="styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header>
			<form action="adduser.php" method="post">
				<h1>Sign Up</h1>
				<hr>
				<h3>Welcome to Tsheel</h3>
				<?php
					if(@$_GET['Error']==true)
					{
						$error = $_GET['Error'];
						$errors = explode(".", $error);
						foreach ($errors as $val) 
						{
							echo "<p><div class=\"error\">$val</div></p>", "<br>";
						}
					}
				?>
				<p><input type="text" name="firstname" id="firstname" placeholder="First Name" required="required"></p>
				<p><input type="text" name="lastname" id="lastname" placeholder="Last Name" required="required"></p>
				<p><input type="email" name="email" id="email" placeholder="tsheeluser@hotmail.com" required="required"></p>
				<p><input type="text" name="username" id="username" placeholder="Username" required="required"></p>
				<p><input type="password" name="password" id="password" placeholder="Password" required="required"></p>
				<br>
				<p><button style="margin-bottom: 20px;" type="submit">Create Account</button></p>
			</form>
	</body>
</html>