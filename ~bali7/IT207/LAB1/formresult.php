<!-- 06/23/2023: Added POST processing for form and calculated results -->
<?php

$earnedParticipation = $_POST['earnedParticipation'];
$maxParticipation = $_POST['maxParticipation'];
$weightParticipation = $_POST['weightParticipation'];
$earnedQuiz = $_POST['earnedQuiz'];
$maxQuiz = $_POST['maxQuiz'];
$weightQuiz = $_POST['weightQuiz'];
$earnedLab = $_POST['earnedLab'];
$maxLab = $_POST['maxLab'];
$weightLab = $_POST['weightLab'];
$earnedPracticum = $_POST['earnedPracticum'];
$maxPracticum = $_POST['maxPracticum'];
$weightPractica = $_POST['weightPracticum'];

Function calculatePercentage($earned, $max){
	$result = $earned / $max;
	return $result;
}

Function calculateWeightedPercentage($percentage, $weight){
	$weight /= 100;
	$result = $percentage * $weight;
	return $result;
}

$participationPercent = calculatePercentage($earnedParticipation, $maxParticipation);
$quizPercent = calculatePercentage($earnedQuiz, $maxQuiz);
$labPercent = calculatePercentage($earnedLab, $maxLab);
$practicaPercent = calculatePercentage($earnedPracticum, $maxPracticum);

$participationGrade = calculateWeightedPercentage($participationPercent, $weightParticipation);
$quizGrade = calculateWeightedPercentage($quizPercent, $weightQuiz);
$labGrade = calculateWeightedPercentage($labPercent, $weightLab);
$practicaGrade = calculateWeightedPercentage($practicaPercent, $weightPractica);

$participationGradeWeighted = $participationGrade * 100;
$quizGradeWeighted = $quizGrade * 100;
$labGradeWeighted = $labGrade * 100;
$practicaGradeWeighted = $practicaGrade * 100;

$grade = $participationGrade + $quizGrade + $labGrade + $practicaGrade;
$grade *= 100;

($grade >= 95) ? $letterGrade = 'an A+' : $x = ' ';
($grade >= 90 && $grade < 95) ? $letterGrade = 'an A' : $x = ' ';
($grade >= 85 && $grade < 90) ? $letterGrade = 'a B+' : $x = ' ';
($grade >= 80 && $grade < 85) ? $letterGrade = 'a B' : $x = ' ';
($grade >= 75 && $grade < 80) ? $letterGrade = 'a C+' : $x = ' ';
($grade >= 70 && $grade < 75) ? $letterGrade = 'a C' : $x = ' ';
($grade >= 60 && $grade < 70) ? $letterGrade = 'a D' : $x = ' ';
($grade < 60) ? $letterGrade = 'an F' : $x = ' '; 

?>

<div class="grade">

	<p><?php echo 'You earned a '.($participationPercent*100).'% for Participation, with a weighted value of '.$participationGradeWeighted.'%.';?></p>
	<p><?php echo 'You earned a '.($quizPercent*100).'% for the Quizzes, with a weighted value of '.$quizGradeWeighted.'%.';?></p>
	<p><?php echo 'You earned a '.($labPercent*100).'% for the Lab Assignments, with a weighted value of '.$labGradeWeighted.'%.';?></p>
	<p><?php echo 'You earned a '.($practicaPercent*100).'% for the Practica, with a weighted value of '.$practicaGradeWeighted.'%.';?></p></br>
	<p><?php echo 'Your Final Grade is a '.$grade.'%, which is '.$letterGrade.'.';?></p>

</div>