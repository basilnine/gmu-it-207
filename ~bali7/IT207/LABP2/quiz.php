<form action="labp2.php" method="post">

	<h1>Online Quiz</h1>

	<?php
	
		$file = fopen("questions.txt", "r+");
		$questionsArray = array();
		$count = 0;
		
		do{
			$questionsArray[$count] = fgets($file);
			$count++;
		}while (!feof($file));
		
		fclose($file);

		$questionsMultiArray = array();
		$maCount = 0;
		
		for ($x = 0; $x < $count; $x++){
			$questionsParse = explode("/", $questionsArray[$x]);
			
			if (str_word_count($questionsParse[0]) > 0 && str_word_count($questionsParse[1]) > 0 && str_word_count($questionsParse[2]) > 0 && str_word_count($questionsParse[3]) > 0 && str_word_count($questionsParse[4]) > 0){
				$record = array('question' => $questionsParse[0], 'a1' => $questionsParse[1], 'a2' => $questionsParse[2], 'a3' => $questionsParse[3], 'a4' => $questionsParse[4]);
				array_push($questionsMultiArray, $record);
				$maCount++;
			}
			
		}
		
		for ($x = 0; $x < $maCount; $x++){
			echo '<p>'.$questionsMultiArray[$x]['question'].'</p>
			<input type="radio" id="q'.($x+1).'" name="q'.($x+1).'" value="'.$questionsMultiArray[$x]['a1'].'">'.$questionsMultiArray[$x]['a1'].'<br>
			<input type="radio" id="q'.($x+1).'" name="q'.($x+1).'" value="'.$questionsMultiArray[$x]['a2'].'">'.$questionsMultiArray[$x]['a2'].'<br>
			<input type="radio" id="q'.($x+1).'" name="q'.($x+1).'" value="'.$questionsMultiArray[$x]['a3'].'">'.$questionsMultiArray[$x]['a3'].'<br>
			<input type="radio" id="q'.($x+1).'" name="q'.($x+1).'" value="'.$questionsMultiArray[$x]['a4'].'">'.$questionsMultiArray[$x]['a4'].'<br>
			<br><br>';
		}
		
		if ($submitSection == 0){
			echo '<input type="submit" id="submit" name="submit" value="Submit Quiz">';
		}
		
		if ($submitSection == 1){
			
			$file1 = fopen("answers.txt", "r+");
			$answersCheck = array();
			$count1 = 0;
			
			do{
				$answersCheck[$count1] = fgets($file1);
				$count1++;
			}while (!feof($file1));
			
			fclose($file1);
			
			$answers = array();
			$maCount1 = 0;
			
			for ($x = 0; $x < $count1; $x++){
				
				if (str_word_count($answersCheck[$x]) > 0){
					$answers[$maCount1] = $answersCheck[$x];
					$maCount1++;
				}
				
			}
			
			$question1 = $_POST['q1'];
			$question2 = $_POST['q2'];
			$question3 = $_POST['q3'];
			
			$answer1 = preg_replace('/\s+/', '', $answers[0]);
			$answer2 = preg_replace('/\s+/', '', $answers[1]);
			$answer3 = preg_replace('/\s+/', '', $answers[2]);
			
			$numQuestions = 3;
			$numCorrectAnswers = 0;
			
			if (strcmp($question1, $answer1) == 0){
				$numCorrectAnswers++;
			}
			if (strcmp($question2, $answer2) == 0){
				$numCorrectAnswers++;
			}
			if (strcmp($question3, $answer3) == 0){
				$numCorrectAnswers++;
			}
		
			$score = $numCorrectAnswers/$numQuestions;
			
			$finalScore = ceil($score * 100);
			
			if ($finalScore >= 80){
				echo '<p id="green">You scored a '.$finalScore.'% on the quiz.</p>';
			}
			elseif ($finalScore >= 60 && $finalScore < 80){
				echo '<p id="yellow">You scored a '.$finalScore.'% on the quiz.</p>';
			}
			elseif ($finalScore >= 50 && $finalScore < 40){
				echo '<p id="red">You scored a '.$finalScore.'% on the quiz.</p>';
			}
			else{
				echo '<p id="fail">You scored a '.$finalScore.'% on the quiz.</p>';
			}
			
			echo '<input type="submit" id="back" name="back" value="Retry Quiz"">';
		}
	?>
	
</form>