<html>
<head>
<link href="styles.css"v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</style>
</head>
<body>
<header>
<form>
<?php
	function validateForm($email,$username,$password,$connection)
	{
		$errormessages = array();
		$emailisValid = false;
		$usernameisValid = false;
		$passwordisValid = false;
		$query = "SELECT username FROM user WHERE username='$username'";
		$result = $connection->query($query);

		if(preg_match("/^[a-zA-Z0-9]+\@[a-z]+\.[a-z\.]+$/i",$email))
		{
			$emailisValid = true;
		}
		else
		{
			array_push($errormessages,"Incorrect email provided, please enter a valid email.");
		}
		
		if(preg_match("/[a-zA-Z0-9_]{8,18}/i",$username))
		{
			$usernameisValid = true;
		}
		else
		{
			array_push($errormessages,"Username must consist of 8-18 characters and can consist of characters,digits and underscores only.");
		}

		if(mysqli_num_rows($result)>0)
		{
			$usernameisValid = false;
			array_push($errormessages,"Username already exists! Please enter a different username.");
		}

		if(preg_match("/[a-zA-Z0-9_]{8,18}/i",$password))
		{
			$passwordisValid = true;
		}
		else
		{
			array_push($errormessages,"Password must consist of 8-18 characters and can consist of characters,digits and underscores only.");
		}

		if($passwordisValid && $emailisValid && $usernameisValid)
		{
			$errormessages[0] =  "Correct Input";
		}
		
		return $errormessages;
	}

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$errors = "";
	$result = false;

	define("host","localhost");
	define("username","root");
	define("password","");
	define("dbname","tsheel");

	$connection = mysqli_connect(host,username,password,dbname);

	if($connection === false)
	{
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$formvalidity = validateForm($email,$username,$password,$connection);

	if($formvalidity[0]=="Correct Input")
	{
		$query = "SELECT max(id) AS id FROM user";
		$result = $connection->query($query);
		if($result)
		{
			$row = mysqli_fetch_assoc($result);
			$id = $row['id']+1;
		}
		else
		{
			$id = 10001;
		}
		$query = "INSERT INTO user VALUES('$firstname','$lastname',$id,'$email','$username','$password')";
		$result = $connection->query($query);
		header("Location:index.php?AccountStatus=success");
	}
	else
	{
		$errors = "";
		foreach ($formvalidity as $value) 
		{
			$errors.=$value;	
		}
		header("Location:signup.php?Error=$errors");
	}

	mysqli_close($connection);
?>
</form>
</header>
</body>
</html>