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
	<p>
		Welcome to Tsheel, you can find and sell all kinds of goods such as: Refrigerators, Air Conditioners, Ovens, Televisions, Cars and many other types of tangible goods. We hope you 
		have a delightful experience with the services provided. Below are some of the products that you will be able to find within our website. <?php echo "Have a good day ", $_SESSION['firstname'];?>
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

		if(isset($_GET['name']))
		{
			#GET PRODUCT ID
			$prodname = $_GET['name'];
			$query = "SELECT product_id FROM product WHERE name = '$prodname'";
			$result = $connection->query($query);
			$row = mysqli_fetch_array($result);
			$prodid = $row['product_id'];

			#GET USER ID
			$firstname = $_SESSION['firstname'];
			$lastname = $_SESSION['lastname'];
			$query = "SELECT id FROM user WHERE firstname = '$firstname' AND lastname='$lastname'";
			$result = $connection->query($query);
			$row = mysqli_fetch_array($result);
			$userid = $row['id'];
			$query = "INSERT INTO bought VALUES($userid,$prodid,1)";
			$result = $connection->query($query);

			$query = "SELECT * FROM product WHERE name='$prodname'";
			$result = $connection->query($query);

			
			while($row = mysqli_fetch_array($result))
			{	
				echo "<h2>{$row['name']} has been added to cart</h2>";
				echo "<hr>";
				echo "<div class=\"grid-container\">";
  				echo "<div class=\"grid-item item1\">{$row['name']}</div>";
  				echo "<div class=\"grid-item item2\"><img style='border: solid 4px black;' src='img/{$row['type']}/{$row['image']}'></div>";
  				echo "<div class=\"grid-item item3\">Release year: {$row['release_year']}</div>";
  				echo "<div class=\"grid-item item4\">Price: {$row['price']} dhs</div>";
  				echo "<div class=\"grid-item item5\">{$row['description']}</div>";
				echo "</div>";
			}
		}
		else
		{
			$firstname = $_SESSION['firstname'];
			$lastname = $_SESSION['lastname'];

			$query = "SELECT user_id FROM bought b,user u WHERE u.id=b.user_id AND u.firstname='$firstname' AND u.lastname='$lastname'";
			$result = $connection->query($query);
			if($result)
			{
				$row = mysqli_fetch_array($result);
				if(isset($row['user_id']))
				{
					$userid = $row['user_id'];
					$query = "SELECT * FROM bought b,product p WHERE p.product_id=b.product_id AND b.user_id = $userid";
					$result = $connection->query($query);
					$numitems = mysqli_num_rows($result);
					echo "<h2>Items in cart: $numitems</h2>";
					echo "<hr>";
					while($row = mysqli_fetch_array($result))
					{
						echo "<div class=\"grid-container\">";
  						echo "<div class=\"grid-item item1\">{$row['name']}</div>";
  						echo "<div class=\"grid-item item2\"><img style='border: solid 4px black;' src='img/{$row['type']}	/{$row['image']}'></div>";
  						echo "<div class=\"grid-item item3\">Release year: {$row['release_year']}</div>";
  						echo "<div class=\"grid-item item4\">Price: {$row['price']} dhs</div>";
  						echo "<div class=\"grid-item item5\">{$row['description']}</div>";
						echo "</div>";
					}
				}
				else
				{
					echo "<h2 style='color:red;'>0 items in cart so far!<h2>";
				}
			}
		}
	?>
	</div>
	</body>
</html>