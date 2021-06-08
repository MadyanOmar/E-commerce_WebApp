<?php
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];

	define("host","localhost");
	define("username","root");
	define("password","");
	define("dbname","tsheel");

	$connection = mysqli_connect(host,username,password,dbname);

	if($connection === false)
	{
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$query = "SELECT username,password,firstname,lastname FROM user WHERE username='$username' AND password='$password'";
	$result = $connection->query($query);
	$accountAvailable = false;

	while ($row = mysqli_fetch_array($result))
	{
		if($username==$row["username"] and $password==$row["password"])
		{
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$accountAvailable=true;
			break;
		}	
	}

	if($accountAvailable)
	{
		header("Location: home.php");
	}
	else
	{
		header("Location: index.php?AccountStatus=NotAvailable");
	}

	mysqli_close($connection);
?>