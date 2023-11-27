<?php

	//Intializes $hide and sets to 1 to hide setup.php
	$hide = 1;
	//Grabs each day times using arrays
	if (isset($_POST['monday'])){
		$monday = $_POST['monday'];
	}
	else{
		$monday = array("null");
	}
	if (isset($_POST['tuesday'])){
		$tuesday = $_POST['tuesday'];
	}
	else{
		$tuesday = array("null");
	}
	if (isset($_POST['wednesday'])){
		$wednesday = $_POST['wednesday'];
	}
	else{
		$wednesday = array("null");
	}
	if (isset($_POST['thursday'])){
		$thursday = $_POST['thursday'];
	}
	else{
		$thursday = array("null");
	}
	if (isset($_POST['friday'])){
		$friday = $_POST['friday'];
	}
	else{
		$friday = array("null");
	}
	
	//Grabs the current month, year, days of the month, and its running days, as well as counts the days
	$currentMonth = date("m");
	$currentYear = date("Y");
	$daysInCurrentMonth = date('t', mktime(0,0,0,$currentMonth,1,$currentYear));
	$runningWeek = date('w', mktime(0,0,0,$currentMonth,1,$currentYear));
	$dayCount = 0;
	
	//This function is used for creating the radio inputs, it checks the name of the current day, then matches it with correct array.
	//Checks the result of the second submission by adding the name next to the time, if that's not the case then it will continue to populate times using radio inputs
	//This function does this for each day of the week. (I could have technically just created another function to pass values, but I'm lazy and I've spent 10 hours total, I'm tired.)
	Function dayLabel(){
		global $monday, $tuesday, $wednesday, $thursday, $friday, $dayName, $currentMonth, $currentYear, $dayCount, $radioResult_day, $radioResult_time, $studentname;
		if ($dayName == 'Monday'){
			if ($monday[0] != "null"){
				if (count($monday) > 0){
					$radioNum = 1;
					for ($z = 0; $z < count($monday); $z++):
						$radioDay = $dayCount;
						$radioID = ($radioDay.$radioNum);
						if (isset($radioResult_day,$studentname)){
							if ($radioResult_day == $dayCount && $radioResult_time == $monday[$z]){
								echo '<div class="radioReserved">'.$radioResult_time.': '.$studentname.'</div>';
							}
							else{
								echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$monday[$z].','.$radioDay.'">';
								echo '<label for="'.$radioID.'">'.$monday[$z].'</label><br>';
							}
						}
						else{
							echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$monday[$z].','.$radioDay.'">';
							echo '<label for="'.$radioID.'">'.$monday[$z].'</label><br>';
						}
						$radioNum++;
					endfor;
				}
			}
		}
		if ($dayName == 'Tuesday'){
			if ($tuesday[0] != "null"){
				if (count($tuesday) > 0){
					$radioNum = 1;
					for ($z = 0; $z < count($tuesday); $z++):
						$radioDay = $dayCount;
						$radioID = ($radioDay.$radioNum);
						if (isset($radioResult_day,$studentname)){
							if ($radioResult_day == $dayCount && $radioResult_time == $tuesday[$z]){
								echo '<div class="radioReserved">'.$radioResult_time.': '.$studentname.'</div>';
							}
							else{
								echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$tuesday[$z].','.$radioDay.'">';
								echo '<label for="'.$radioID.'">'.$tuesday[$z].'</label><br>';
							}
						}
						else{
							echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$tuesday[$z].','.$radioDay.'">';
							echo '<label for="'.$radioID.'">'.$tuesday[$z].'</label><br>';
						}
						$radioNum++;
					endfor;
				}
			}
		}
		if ($dayName == 'Wednesday'){
			if ($wednesday[0] != "null"){
				if (count($wednesday) > 0){
					$radioNum = 1;
					for ($z = 0; $z < count($wednesday); $z++):
						$radioDay = $dayCount;
						$radioID = ($radioDay.$radioNum);
						if (isset($radioResult_day,$studentname)){
							if ($radioResult_day == $dayCount && $radioResult_time == $wednesday[$z]){
								echo '<div class="radioReserved">'.$radioResult_time.': '.$studentname.'</div>';
							}
							else{
								echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$wednesday[$z].','.$radioDay.'">';
								echo '<label for="'.$radioID.'">'.$wednesday[$z].'</label><br>';
							}
						}
						else{
							echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$wednesday[$z].','.$radioDay.'">';
							echo '<label for="'.$radioID.'">'.$wednesday[$z].'</label><br>';
						}
						$radioNum++;
					endfor;
				}
			}
		}
		if ($dayName == 'Thursday'){
			if ($thursday[0] != "null"){
				if (count($thursday) > 0){
					$radioNum = 1;
					for ($z = 0; $z < count($thursday); $z++):
						$radioDay = $dayCount;
						$radioID = ($radioDay.$radioNum);
						if (isset($radioResult_day,$studentname)){
							if ($radioResult_day == $dayCount && $radioResult_time == $thursday[$z]){
								echo '<div class="radioReserved">'.$radioResult_time.': '.$studentname.'</div>';
							}
							else{
								echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$thursday[$z].','.$radioDay.'">';
								echo '<label for="'.$radioID.'">'.$thursday[$z].'</label><br>';
							}
						}
						else{
							echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$thursday[$z].','.$radioDay.'">';
							echo '<label for="'.$radioID.'">'.$thursday[$z].'</label><br>';
						}
						$radioNum++;
					endfor;	
				}
			}
		}
		if ($dayName == 'Friday'){
			if ($friday[0] != "null"){
				if (count($friday) > 0){
					$radioNum = 1;
					for ($z = 0; $z < count($friday); $z++):
						$radioDay = $dayCount;
						$radioID = ($radioDay.$radioNum);
						if (isset($radioResult_day,$studentname)){
							if ($radioResult_day == $dayCount && $radioResult_time == $friday[$z]){
								echo '<div class="radioReserved">'.$radioResult_time.': '.$studentname.'</div>';
							}
							else{
								echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$friday[$z].','.$radioDay.'">';
								echo '<label for="'.$radioID.'">'.$friday[$z].'</label><br>';
							}
						}
						else{
							echo '<input type="radio" id="'.$radioID.'" name="time" value="'.$friday[$z].','.$radioDay.'">';
							echo '<label for="'.$radioID.'">'.$friday[$z].'</label><br>';
						}
						$radioNum++;
					endfor;
				}
			}
		}
	}
?>
<!-- This is the start of the form for the second submission for the calendar. 
Sends both the student name, email, and passes the hide value and the arrays again -->
<form action="lab2.php" method="post">
	<h1>Office Hours Sign Up</h1>
	<p>Student Name: <input type="text" name="studentname"/> 
	Student Email: <input type="email" name="studentemail"/>
	<input type="hidden" id="hide" name="hide" value="1">
	<input type="submit" name="submit2" value="Submit">
	<input type="reset" value="Clear">
	</p>
	<?php
		//Creates a hidden input type to pass the values from the array back through $_POST
		foreach($monday as $value){
				echo '<input type="hidden" name="monday[]" value="'.$value.'">';
		}
		foreach($tuesday as $value){
				echo '<input type="hidden" name="tuesday[]" value="'.$value.'">';
		}
		foreach($wednesday as $value){
				echo '<input type="hidden" name="wednesday[]" value="'.$value.'">';
		}
		foreach($thursday as $value){
				echo '<input type="hidden" name="thursday[]" value="'.$value.'">';
		}
		foreach($friday as $value){
				echo '<input type="hidden" name="friday[]" value="'.$value.'">';
		}
	
		//Checks if the second submission is made, it will grab the time from the radio and split the values in two different elements and will store each element into a seperate variable
		if (isset($_POST['submit2'])){
			if (isset($_POST['time'])){
				$radioResult = explode(",", $_POST['time']);
				$radioResult_time = $radioResult[0];
				$radioResult_day = $radioResult[1];
			}
			//Checks if the time, email, and name are set and not empty. If true, it will grab in post the name and email and will attempt to use the mail() function to send the email
			if (isset($_POST['time']) && !empty($_POST['studentemail']) && !empty($_POST['studentname'])){
				$studentname = $_POST['studentname'];
				$email = $_POST['studentemail'];
				$msg = "A Student, ".$studentname." with the email: ".$email." has requested office hours meeting on: ".$currentMonth."/".$radioResult_day."/".$currentYear." at ".$radioResult_time;
				echo 'Email successfully sent from '.$email;
				mail("euyar@gmu.edu", "IT-207: Student Requested Office Hours!", $msg);
			}
			//If any of the values through $_POST are empty or not set, then it will generate an error message for each value that was empty
			if (empty($_POST['studentemail'])){
				echo 'Error: Email must not be empty!<br>';
			}
			if (empty($_POST['studentname'])){
				echo 'Error: Student name must not be empty!<br>';
			}
			if (!isset($_POST['time'])){
				echo 'Error: You must select a time!<br>';
			}
	}
	
	?>
	<!-- This header grabs the current month and year of the calendar using PHP date() function -->
	<div class="cal-header">
		<?php echo date("F Y");
		?>
	</div>
	<!-- Puts a month class, that has a week flexbox and seperate day flexboxes. The first week is simply the day labels -->
	<div class="month">
		<div class="week" id="label">
			<div class="day">Sunday</div>
			<div class="day">Monday</div>
			<div class="day">Tuesday</div>
			<div class="day">Wednesday</div>
			<div class="day">Thursday</div>
			<div class="day">Friday</div>
			<div class="day">Saturday</div>
		</div>
		<div class="week">
		<!-- The first week is the running week, this will run a PHP script to create empty boxes until the first day of the week for the month is met -->
			<?php 
				for ($x = 0; $x < $runningWeek; $x++):
					echo '<div class="day"></div>';
				endfor;
				for ($x = $runningWeek; $x < 7; $x++):
					++$dayCount;
					$dayName = date('l', mktime(0,0,0,$currentMonth,$dayCount,$currentYear));
					echo '<div class="day">'.$dayCount.'<div>';
					dayLabel();
					echo '</div></div>';
				endfor;
			?>
		</div>
		<!-- This PHP script runs each week and continues until the last day of the month, then fills the last week with blank boxes until the calendar is complete -->
		<?php
			$weeksInMonth = ceil(($daysInCurrentMonth - $dayCount) / 7);
			for ($x = 0; $x < $weeksInMonth; $x++):
				echo '<div class="week">';
				for ($y = 0; $y < 7; $y++):
					if ($dayCount < $daysInCurrentMonth){
						++$dayCount;
						$dayName = date('l', mktime(0,0,0,$currentMonth,$dayCount,$currentYear));
						echo '<div class="day">'.$dayCount.'<div>';
						dayLabel();
						echo '</div></div>';
					}
					else{
						echo '<div class="day"></div>';
					}
				endfor;
				echo '</div>';
			endfor;
		?>
	</div>
</form>