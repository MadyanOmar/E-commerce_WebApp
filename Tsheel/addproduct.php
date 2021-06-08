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
		have a delightful experience with the services provided. Below are some of the products that you will be able to find within our website.
	</p>
	<hr>
		<form method="post" action="product.php?" style="border: solid 2px maroon;" enctype="multipart/form-data">
		<legend style="font-size: 19px; font-weight: bolder; color: maroon; text-decoration: underline;">Sell a product</legend>
		<label for="type" style="font-size: 14px;">Select what you would like:</label>
		<select name="type">
			<option name="Cars">Cars</option>
			<option name="Ovens">Ovens</option>
			<option name="ACs">ACs</option>
			<option name="TVs">TVs</option>
			<option name="Cars">Electronics</option>
			<option name="Fridges">Fridges</option>
		</select>
		<br>
		<label for="name">What is the product called:</label>
		<input type="text" name="name" required>
		<br>
		<label for="release_year">When was it released:</label>
		<input type="text" name="release_year" required>
		<br>
		<label for="price">Set the price:</label>
		<input id="slider" type="range" name="price" value="260000" min="100" max="500000" oninput="this.nextElementSibling.value = this.value">
		<output>260000</output> dhs
		<br>
		<label for="used">Condition of product:</label>
		<input type="radio" name="used" value="1" required>Used
		<input type="radio" name="used" value="0">Not Used
		<br>
		<hr style="border-color: maroon;">
		<label for="description">Information about the product:</label>
		<textarea name="description" cols="40" rows="4" placeholder="Give this product a description..."></textarea>
		<br>
		<label for="image">Upload an image of the product:</label>
		<input type="file" name="image">
		<br>
		<label for="submit">Submit Filters: </label>
		<input type="submit" name="submit" style="background-color: maroon; color: white; margin-bottom: 10px;">
		</form>
	</div>
	</body>
</html>