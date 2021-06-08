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
		Welcome to Tsheel, you can find and sell all kinds of goods such as: Refrigerators, Air Conditioners, Ovens, Televisions, Cars and many other types of tangible goods. We hope you 
		have a delightful experience with the services provided. Below are some of the products that you will be able to find within our website.
	</p>
	<hr>
	<div>
		<?php
			define("host","localhost");
			define("username","root");
			define("password","");
			define("dbname","tsheel");
			
			if(isset($_POST["submit"]))
			{
				$type = $_POST["type"];
				$target = "img/$type/". basename($_FILES['image']['name']);
				$connection = mysqli_connect(host,username,password,dbname);

				if($connection === false)
				{
    				die("ERROR: Could not connect. " . mysqli_connect_error());
				}

				$productname = $_POST['name'];
				$release_year = $_POST['release_year'];
				$used = $_POST['used'];
				$price = $_POST['price'];
				$image = $_FILES['image']['name'];
				$description = $_POST['description'];


				$query = "SELECT max(product_id) as id FROM product";
				$result = $connection->query($query);
				$row = mysqli_fetch_array($result);
				$prodid = $row['id']+1;

				$query = "INSERT INTO product VALUES($prodid,'$type','$productname',$release_year,$used,$price,'$image','$description')";
				$result = $connection->query($query);

				$firstname = $_SESSION['firstname'];
				$lastname = $_SESSION['lastname'];

				$query = "SELECT id as id FROM user WHERE firstname='$firstname' AND lastname='$lastname'";
				$result = $connection->query($query);
				$row = mysqli_fetch_array($result);
				$id = $row['id'];

				$query = "INSERT INTO user_product VALUES($id,$prodid,1)";
				$result = $connection->query($query);

				if($result)
				{ 
    				header("Location:home.php");
				} 
				else 
				{
    				echo "<p> There was an error when creating the subject </p>";
				}	
			}		
			mysqli_close($connection);
		?>
	</div>
	</body>
</html>