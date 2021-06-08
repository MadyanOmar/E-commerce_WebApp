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
			<img src="img/tsheellogo.png" style="width: 100px; height: 100px; display: inline;">
			<ul>
				<li style="margin-left: 0px;"><a href="home.php">Home</a></li>
				<li><a href="categories.php">Categories</a></li>
				<li><a href="aboutus.html">About Us</a></li>
				<li><a href="findus.html">Find Us</a></li>
				<li><a href="profile.php">My Account</a></li>
			</ul>
		</header>
		<br>
	<h1 style="border-top: dashed 3px #6E172B; padding-top: 20px;">Tsheel Home Page</h1>
	<hr>
		<?php
			define("host","localhost");
			define("username","root");
			define("password","");
			define("dbname","tsheel");
		
			$connection = mysqli_connect(host,username,password,dbname);
			$name = $_GET['name'];

			$query = "SELECT * FROM product WHERE name='$name'";
			$result = $connection->query($query);
		?>

		<?php
			while($row=mysqli_fetch_array($result))
			{
				echo "<figure>";
				echo "<center><img style='border: 4px solid maroon;'src=\"img/{$row['type']}/{$row['image']}\"></center>";
				echo "<center><figcaption>{$row['name']}</figcaption></center>";
				echo "</figure>";
				echo "<center>{$row['description']}</center>";
				echo "<center>Release Year: {$row['release_year']}</center>";
				echo "<center>Price: {$row['price']} dhs</center>";
			}
		?>
		<br>
		<?php
			echo "<center><button onclick=\"window.location='cart.php?name=$name';\"><img style='width: 20px; height: 20px;' src='img/cart.png'> &nbsp; Add to cart</button></center>";
		?>
	</body>
</html>