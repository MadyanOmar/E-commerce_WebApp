<?php
	session_start();
?>
<!DOCTYPE html>
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
	<p>
		Welcome to Tsheel <?php echo $_SESSION['firstname'];?>, you can find and sell all kinds of goods such as: Refrigerators, Air Conditioners, Ovens, Televisions, Cars and many other types of tangible goods. We hope you 
		have a delightful experience with the services provided. Below are some of the products that you will be able to find within our website. 
	</p>
	<hr>
	<div class="products">
	<?php
		define("host","localhost");
		define("username","root");
		define("password","");
		define("dbname","tsheel");
	
		$connection = mysqli_connect(host,username,password,dbname);
	
		if($connection === false)
		{
    		die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		#DISPLAY CARS
		$query = "SELECT name, image ,price FROM product p LEFT JOIN bought b on b.product_id = p.product_id WHERE b.product_id IS NULL AND p.type = 'Cars'";
		$result = $connection->query($query);
		echo "<h2>Cars</h2>";
		echo "<div class=\"Cars\">";
		while ($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			echo "<div id=\"Cars\">";
			echo "<a href=\"viewproduct.php?name=$name\">",$row["name"],"</a><br>";
			echo "<img src=\"img/Cars/",$row["image"],"\">";
			echo "<br> Price: ",$row["price"], " dhs",'<br>';
			echo "</div>";
		}
		echo "</div>";
		#DISPLAY REFRIGERATORS
		$query = "SELECT name, image ,price FROM product p LEFT JOIN bought b on b.product_id = p.product_id WHERE b.product_id IS NULL AND p.type = 'Fridges'";
		$result = $connection->query($query);


		echo "<h2>Refrigerators</h2>";
		echo "<div class=\"Fridges\">";
		while ($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			echo "<div id=\"Fridges\">";
			echo "<a href=\"viewproduct.php?name=$name\">",$row["name"],"</a><br>";
			echo "<img src=\"img/Fridges/",$row['image'],"\">";
			echo "<br> Price: ",$row["price"], " dhs",'<br>';
			echo "</div>";
		}
		echo "</div>";

		#DISPLAY OVENS
		$query = "SELECT name, image ,price FROM product p LEFT JOIN bought b on b.product_id = p.product_id WHERE b.product_id IS NULL AND p.type = 'Ovens'";
		$result = $connection->query($query);

		echo "<h2>Ovens</h2>";
		echo "<div class=\"Ovens\">";
		while ($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			echo "<div id=\"Ovens\">";
			echo "<a href=\"viewproduct.php?name=$name\">",$row["name"],"</a><br>";
			echo "<img src=\"img/Ovens/",$row['image'],"\">";
			echo "<br> Price: ",$row["price"], " dhs",'<br>';
			echo "</div>";
		}
		echo "</div>";

		#DISPLAY TV'S
		$query = "SELECT name, image ,price FROM product p LEFT JOIN bought b on b.product_id = p.product_id WHERE b.product_id IS NULL AND p.type = 'TVs'";
		$result = $connection->query($query);

		echo "<h2>Televisions</h2>";
		echo "<div class=\"TVs\">";
		while ($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			echo "<div id=\"TVs\">";
			echo "<a href=\"viewproduct.php?name=$name\">",$row["name"],"</a><br>";
			echo "<img src=\"img/TVs/",$row['image'],"\">";
			echo "<br> Price: ",$row["price"], " dhs",'<br>';
			echo "</div>";
		}
		echo "</div>";

		#DISPLAY OTHER ELECTRONICS
		$query = "SELECT name, image ,price FROM product p LEFT JOIN bought b on b.product_id = p.product_id WHERE b.product_id IS NULL AND p.type = 'Electronics'";
		$result = $connection->query($query);

		echo "<h2>Electronics</h2>";
		echo "<div class=\"Electronics\">";
		while ($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			echo "<div id=\"Electronics\">";
			echo "<a href=\"viewproduct.php?name=$name\">",$row["name"],"</a><br>";
			echo "<img src=\"img/Electronics/",$row['image'],"\">";
			echo "<br> Price: ",$row["price"], " dhs",'<br>';
			echo "</div>";
		}
		echo "</div>";
	?>
	</div>
	</body>
</html>