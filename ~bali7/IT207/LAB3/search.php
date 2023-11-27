<!-- Search Form, which is front page for directory -->
<form action="lab3.php" method="post">
	<h1>Online Contacts Directory</h1>
	<h2>Search for a Contact</h2>
	First Name: <input type="text" id="fname" name="fname"><br>
	Last Name: <input type="text" id="lname" name="lname"><br>
	<input type="hidden" id="hide" name="hide" value="1">
	<input type="submit" id="search" name="search" value="Search">
	<input type="submit" id="add" name="add" value="Add New Contact"><br><br>
	<?php

	//Code to add new contact entry
	if (isset($_POST['add2'])){
		if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['zip'])){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			
			$newEntry = $fname.",".$lname.",".$email.",".$phone.",".$address.",".$city.",".$state.",".$zip."\n\r";
			
			$file = fopen("contacts.txt","a+t");
			if (fwrite($file, $newEntry) > 0){
				echo "Entry was successfully added!";
			}
			fclose($file);
		}
		else{
			echo "Error! Contact was not created!;";
		}
	}
	if (isset($_POST['update'])){
		if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['zip'])){
			
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			
			$file = fopen("contacts.txt","a+t");
			
			$contactsFile = file('contacts.txt');

			function replace($contactsFile){
				global $fname, $lname, $email, $phone, $address, $city, $state, $zip;
				if (stristr($contactsFile, $fname.','.$lname)){
					return $fname.','.$lname.','.$email.','.$phone.','.$address.','.$city.','.$state.','.$zip."\n\r";
				}
				return $contactsFile;
			}
			$contactsFile = array_map('replace', $contactsFile);
			file_put_contents('contacts.txt', $contactsFile);

			fclose($file);
			
			echo "Successfully updated record!";
		}
	}

	?>
</form>