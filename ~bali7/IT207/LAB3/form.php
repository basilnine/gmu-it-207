<!-- Form for Update/Add Contact -->
<?php
	$states = array("Alabama", "Alaska", "Arizona", "Arkansa", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming");
	$count = count($states);
?>
<form action="lab3.php" method="post">
	<h1>Online Contacts Directory</h1>
	<?php 
	echo '<h2>'.$header.'</h2>';
	if ($form == 1){	
		echo 'First Name: <input type="text" id="fname" name="fname" required>
		Last Name: <input type="text" id="lname" name="lname" required><br>
		Email Address: <input type="email" id="email" name="email" required><br>
		Phone Number: <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
		Address: <input type="text" id="address" name="address" required>
		City: <input type="text" id="city" name="city" required><br>
		State: <select name="state" id="state" required>';
		
			for ($x = 0; $x < $count; $x++):
				echo '<option value="'.$states[$x].'">'.$states[$x].'</option>';
			endfor;
			
		echo '</select>
		ZIP: <input type="tel" id="zip" name="zip" pattern="[0-9]{5}" required><br>
		<input type="hidden" id="hide" name="hide" value="0">
		<input type="button" id="back" value="Back" onclick="history.back()">';
		echo '<input type="submit" id="add" name="add2" value="Add New Contact">';
	}
		
	if ($form == 2){
		if (empty($fname) && empty($lname)){
			echo $fnameSearch." ".$lnameSearch." was not found!<br>";
			echo '<input type="button" id="back" value="Back" onclick="history.back()">';
		}
		else{
			echo 'First Name: <input type="text" id="fname" name="fname" value="'.$fname.'" readonly required>
			Last Name: <input type="text" id="lname" name="lname" value="'.$lname.'" readonly required><br>
			Email Address: <input type="email" id="email" name="email" value="'.$email.'" required><br>
			Phone Number: <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="'.$phone.'" required><br>
			Address: <input type="text" id="address" name="address" value="'.$address.'" required>
			City: <input type="text" id="city" name="city" value="'.$city.'" required><br>
			State: <select name="state" id="state" value="'.$state.'" required>';
			
			
				for ($x = 0; $x < $count; $x++):
					if ($states[$x] == $state){
						echo '<option value="'.$states[$x].'" selected>'.$states[$x].'</option>';
					}
					else{
						echo '<option value="'.$states[$x].'">'.$states[$x].'</option>';
					}
				endfor;
				
			echo '</select>
			ZIP: <input type="tel" id="zip" name="zip" pattern="[0-9]{5}" value="'.$zip.'" required><br>
			<input type="hidden" id="hide" name="hide" value="0">
			<input type="button" id="back" value="Back" onclick="history.back()">';
			echo '<input type="submit" id="update" name="update" value="Update New Contact">';
		}
	}
	
	if ($form == 3){
			echo "Error! First name and Last name cannot be empty!<br>";
			echo '<input type="button" id="back" value="Back" onclick="history.back()">';
	}
	?>
</form>