<!-- Example from pages 362- 364 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Quiz</title>
</head>
<body>
	<?php
		// associative array of the questions and answers
		$StateCapitals = array(
			"Connecticut" => "Hartford",
			"Maine" => "Augusta",
			"Massachusetts" => "Boston", 
			"New Hampshire" => "Concord",
			"Rhode Island" => "Providence",
			"Vermont" => "Montpelier");

		// determine if the submit button was clicked
		if(isset($_POST["submit"])) {
			// create an array out of the array of the user-submitted data
			$Answers = $_POST["answers"];
			if(is_array($Answers)) {
				// we checked $Answers and it IS an array
				foreach($Answers as $State => $Response) {
					$Response = stripslashes($Response);
					if(strlen($Response) > 0) {
						if(strcasecmp($StateCapitals[$State], $Response) == 0) {
							echo "<p>Correct! The capital of $State is " . $StateCapitals[$State] . ".</p>\n";
						}
						else {
							// we have an incorrect answer
							echo "<p>Sorry, the capital of $State is not $Response.</p>\n";
						}
					}
					else {
						// this answer was left empty
						echo "<p>You did not enter a value for the capital of $State!</p>\n";
					}
				} // end of foreach loop
			}
			echo "<p><a href='Quiz.php'>Try Again?</a></p>\n";
		}
		else {
			echo "<form action='Quiz.php' method='POST'>\n";
			foreach($StateCapitals as $State => $Response) {
				echo "The capital of $State is: <input type='text' name='answers[" . $State . "]' /><br/>\n";
			} // end of foreach loop
			echo "<input type='submit' name='submit' value='Check Answers' />";
			echo "<input type='reset' name='reset' value='Reset Form' />\n";
			echo "</form>\n";
		}

	?>
</body>
</html> 