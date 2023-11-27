<!-- Contact PHP Processing / Form valdiation -->
<?php

	if (isset($_POST['add'])){
		$header = "New Contact Entry";
		$form = 1;
	}
	if (isset($_POST['search'])){
		$header = "Update Contact Entry";
		$form = 2;
		
		if (!empty($_POST['fname']) && !empty($_POST['lname'])){
			
			$fnameSearch = $_POST['fname'];
			$lnameSearch = $_POST['lname'];
			
			$contactsFile = fopen("contacts.txt", "a+t");
			do{
				$contactLine = fgets($contactsFile);
				if ((stristr($contactLine, $fnameSearch.','.$lnameSearch))){
					$foundContact = explode(",", $contactLine);
					$fname = $foundContact[0];
					$lname = $foundContact[1];
					$email = $foundContact[2];
					$phone = $foundContact[3];
					$address = $foundContact[4];
					$city = $foundContact[5];
					$state = $foundContact[6];
					$zip = $foundContact[7];
				}
			}while (!feof($contactsFile));
				
			fclose($contactsFile);
		}
		else{
			$form = 3;
		}
	}
	//Add code for code form validation
	include ('form.php');
	
?>