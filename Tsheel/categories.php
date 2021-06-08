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
		Welcome to Tsheel, you can find and sell all kinds of goods such as: Refrigerators, Air Conditioners, Ovens, Televisions, Cars and many other types of tangible goods. We hope you 
		have a delightful experience with the services provided. Below is a filtering system that allows you to find exactly what you want, the prices you are willing to afford and decided if you want a second hand item or brand new item.
	</p>
	<hr>
	<form method="GET" action="categories.php" style="border: solid 2px maroon;">
		<legend style="font-size: 19px; font-weight: bolder; color: maroon; text-decoration: underline;">Filter based on your needs</legend>
		<label for="type" style="font-size: 14px;">Select what you would like:</label>
		<select name="type">
			<option name="Cars">Cars</option>
			<option name="Ovens">Ovens</option>
			<option name="ACs">AC's</option>
			<option name="TVs">TV's</option>
			<option name="Cars">Electronics</option>
			<option name="Fridges">Fridges</option>
		</select>
		<br>
		<label for="minprice"">Select the minimum price you are willing to pay:</label>
		<input id="slider" type="range" name="minprice" value="260000" min="100" max="500000" oninput="this.nextElementSibling.value = this.value">
		<output>260000</output> dhs
		<br>
		<label for="maxprice">Select the maximum price you are willing to pay:</label>
		<input id="slider" type="range" name="maxprice" value="260000" min="100" max="500000" oninput="this.nextElementSibling.value = this.value">
		<output>260000</output> dhs
		<br>
		<label for="used">Condition of product:</label>
		<input type="radio" name="used" value="1" required>Used
		<input type="radio" name="used" value="0">Not Used
		<br>
		<label for="submit">Submit Filters: </label>
		<input type="submit" name="submit" style="background-color: maroon; color: white; margin-bottom: 10px;">
	</form>
	<div class="products">
	<?php
		define("host","localhost");
		define("username","root");
		define("password","");
		define("dbname","tsheel");
	
		$connection = mysqli_connect(host,username,password,dbname);

		$type = @$_GET["type"];
		$minprice = @$_GET["minprice"];
		$maxprice = @$_GET["maxprice"];
		$used = @$_GET["used"];
		if($connection === false)
		{
    		die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		#DISPLAY CARS
		if(isset($_GET["submit"]))
		{
			$query = "SELECT name, image, price FROM product WHERE type='$type' AND used=$used AND price<=$maxprice AND price>=$minprice";
			$result = $connection->query($query);
			$matches = mysqli_num_rows($result);
			echo "<h2>$type</h2>";
			if($matches == 0)
			{
				echo "<p style=\"color:red\";>$matches matches found</p>";
			}
			elseif ($matches == 1) 
			{
				echo "<p style=\"color:rgb(0,255,0);\">$matches match found</p>";
			}
			else
			{
				echo "<p style=\"color:rgb(0,255,0);\";>$matches matches found</p>";
			}
			
			echo "<div class=\"$type\">";
			while ($row = mysqli_fetch_array($result))
			{
				echo "<div id=\"$type\">";
				echo $row["name"],"<br>";
				echo "<img src=\"img/$type/",$row['image'],"\">";
				echo "<br> Price: ",$row["price"], " dhs",'<br>';
				echo "</div>";
			}
			
		}
	?>
	</div>
	</body>
</html>