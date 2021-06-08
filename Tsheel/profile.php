<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head>
		<title>Tsheel</title>
		<link href="stylesheet.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header>
			<center><img src="img/tsheellogo.png" style="width: 100px; height: 100px; display: inline;"></center>
			<center><h1 style="display: inline;">Tsheel</h1></center>
			<hr>
			<center><u><h2>Welcome <?php echo $_SESSION['firstname'], " ", $_SESSION['lastname'];?></h2></u></center>
			<center><h3><a href="addproduct.php" style='border: solid 2px maroon; border-radius: 5px; background-color: rgba(110,23,43,0.2); padding: 5px;'>Sell a product</a></h3></center>
			<center><h3><a href="cart.php" style='border: solid 2px maroon; border-radius: 5px; background-color: rgba(110,23,43,0.2); padding: 5px 17px 5px 17px;'>View Cart</a></h3></center>
			<?php
				$prevpage = $_SERVER['HTTP_REFERER'];
				echo "<center><h3><a href=\"$prevpage\" style='border: solid 2px maroon; border-radius: 5px; background-color: rgba(110,23,43,0.2); padding: 5px 25px 5px 25px;'>Go back</a></h3></center>";
			?>
			
			<center><h3><a href="logout.php" style='border: solid 2px maroon; border-radius: 5px; background-color: rgba(110,23,43,0.2); padding: 5px 28px 5px 28px;'>Logout</a></h3></center>
		</header>
	</body>
</html>