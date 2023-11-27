<!-- The setup form uses a similar structure as the calender, but is adjusted for multiple select boxes -->
<form action="lab2.php" method="post">
	<h1>Office Hours Setup Form</h1>
	<div class="month">
		<div class="week" id="label">
			<div class="day">Day:</div>
			<div class="day">Monday</div>
			<div class="day">Tuesday</div>
			<div class="day">Wednesday</div>
			<div class="day">Thursday</div>
			<div class="day">Friday</div>
		</div>
		<div class="week" id="select">
			<?php
				//Array for the available times 7am - 10pm, in a 30 minute interval
				$times = array("7:00am", "7:30am", "8:00am", "8:30am", "9:00am", "9:30am", "10:00am", "10:30am", "11:00am", "11:30am", "12:00pm", "12:30pm", "1:00pm", "1:30pm", "2:00pm", "2:30pm", "3:00pm", "3:30pm", "4:00pm", "4:30pm", "5:00pm", "5:30pm", "6:00pm", "6:30pm", "7:00pm", "7:30pm", "8:00pm", "8:30pm", "9:00pm", "9:30pm", "10:00pm");
				$count = count($times);
			?>
			<!-- Each day will grab multiple values and pass onto an array in the calendar.php include -->
			<div class="day" id="time">Time:</div>
			<div class="day">
				<select name="monday[]" id="monday" multiple>
					<?php
						for ($x = 0; $x < $count; $x++):
							echo '<option value="'.$times[$x].'">'.$times[$x].'</option>';
						endfor;
					?>
				</select>
			</div>
			<div class="day">				
				<select name="tuesday[]" id="tuesday" multiple>
						<?php
							for ($x = 0; $x < $count; $x++):
								echo '<option value="'.$times[$x].'">'.$times[$x].'</option>';
							endfor;
						?>
				</select>
			</div>
			<div class="day">
							<select name="wednesday[]" id="wednesday" multiple>
						<?php
							for ($x = 0; $x < $count; $x++):
								echo '<option value="'.$times[$x].'">'.$times[$x].'</option>';
							endfor;
						?>
				</select>
			</div>
			<div class="day">
							<select name="thursday[]" id="thursday" multiple>
						<?php
							for ($x = 0; $x < $count; $x++):
								echo '<option value="'.$times[$x].'">'.$times[$x].'</option>';
							endfor;
						?>
				</select>
			</div>
			<div class="day">
							<select name="friday[]" id="friday" multiple>
						<?php
							for ($x = 0; $x < $count; $x++):
								echo '<option value="'.$times[$x].'">'.$times[$x].'</option>';
							endfor;
						?>
				</select>
			</div>
		</div>
	</div>
	<div class="submit">
		<input type="submit" name="submit1" value="Submit">
		<input type="reset" value="Clear">
	</div>
</form>