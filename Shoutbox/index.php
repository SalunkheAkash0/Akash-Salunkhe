<?php 
//include database file
include 'database.php';
?>

<?php 
	//Create Select Query

	$query = "SELECT * FROM shouts ORDER BY id DESC";
	$execute = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>SHOUT IT!</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div id="container">
		
		<header>
			<h1>SHOUT IT! Shoutbox</h1>
		</header>

		<div id="shouts">
			<ul>
				<?php while($row = mysqli_fetch_assoc($execute)): ?>
					<li class="shout"><span><?php echo $row['time']; ?> - </span><strong><?php echo $row['user']; ?></strong>: <?php echo $row['message']; ?></li>
				<?php endwhile; ?>
			</ul>
		</div>
        
		<div id="input">
			<?php if(isset($_GET['error'])): ?>
				<p id = "errors"><?php echo $_GET['error']; ?></p>
			<?php endif; ?>

			<form method="post" action="process.php">

				<input type="text" name="user" placeholder="Enter Your Name">
				<input type="text" name="message" placeholder="Enter Message">
				<!-- Added break line to see bbutton below the above input fields -->
				<br>
				<input class="shout-btn" type="submit" name="submit" value="Shout It Out">
			</form>
			
		</div>
      

	</div>

</body>
</html>