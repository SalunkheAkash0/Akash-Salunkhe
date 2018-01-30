<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
	//Check to see if score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}

	if(isset($_POST['submit'])){

		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];

		echo $number . "<br>";
		echo $selected_choice;
		$next = $number + 1;


		//Get total number of questions
		$query = "SELECT * FROM `questions`";
		$no_of_qt = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$no_of_qt = $no_of_qt->num_rows;




		//Get correct choice

		$query = "SELECT * FROM `choices` Where question_number =$number AND is_correct = 1";

		//Get result
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		//Get row
		$row = $result->fetch_assoc();

		//Set correct choice
		$correct_choice = $row['id'];

		//Compare
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}


		//check if last question
		if($number == $no_of_qt){
			header("Location: final.php");
			exit();
		}
		else {
			header("Location: question.php?n=" . $next);
		}

	}





 ?>