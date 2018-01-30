<?php  

session_start();

 ?>
<?php include 'database.php'; ?>
<?php 
	//Set Question number

	$number = (int) $_GET['n'];

	//Get Question
	$query = "SELECT * FROM `questions` WHERE question_number = $number";

	//Get Result

	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$question = $result->fetch_assoc();



	//Get Choice
	$query = "SELECT * FROM `choices` WHERE question_number = $number";

	//Get Results

	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

	
	//Get total number of questions
		$query = "SELECT * FROM `questions`";
		$no_of_qt = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$no_of_qt = $no_of_qt->num_rows;



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Quizzer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
	<div class="container">
		<h1>PHP QUIZZER</h1>
	</div>
</header>
<main>
	<div class="container">
		<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $no_of_qt; ?></div>
		<p class="question">
			<?php echo $question['text']; ?>
		</p>
		<form method="post" action="process.php">
			<ul class="choices">
			<?php while($row = $choices->fetch_assoc()) : ?>

				<li><input type="radio" name="choice" value="<?php echo $row['id'];; ?>"><?php echo $row['text'] ;?></li>

			<?php endwhile; ?>
				
			</ul>
			<input type="submit" value="Submit" name="submit">
			<input type="hidden" name="number" value="<?php  echo $number ;?>">
		</form>
	</div>
</main>

<footer>
	<div class="container">
		Copyright &copy; 2018, PHP Quizzer
	</div>
</footer>

</body>
</html>