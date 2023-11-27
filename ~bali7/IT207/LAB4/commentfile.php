<form action="lab4.php" method="post">
<?php
	
	//Add new entry
	if (isset($_POST['addText'])){
		
		//Checks to see if entries are not empty
		if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['commentbox'])){
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$commentbox = $_POST['commentbox'];
			
			if (filter_var($email, FILTER_VALIDATE_EMAIL)){
				
				//Checks file to see if the same person added that comment, will switch to false if the same person has already made a comment
				$commentsFile = fopen("comments.txt","r");
				$valid = true;
				do{
					$commentsLine = fgets($commentsFile);
					if ((stristr($commentsLine, $name.','.$email))){
						$valid = false;
					}
				}while (!feof($commentsFile));
				
				fclose($commentsFile);
				
				//Adds new comment if validation check is passed
				if ($valid == true){
					$newEntry = $name.",".$email.",".$commentbox."\n\r";
					
					$file = fopen("comments.txt","a+t");
					if (fwrite($file, $newEntry) > 0){
						echo '<h1>Comments Added</h1>
						Name: <a href="mailto:'.$email.'">'.$name.'</a><br>
						Comment: '.$commentbox.'<br>
						<input type="button" id="back" value="Back" onclick="history.back()">
						<input type="submit" id="viewFileCommentsText" name="viewFileCommentsText" value="View Posted Comments">';
					}
					fclose($file);
				}
				//Sends an error message if validation check is not passed
				else{
					echo '<h1>Comments Not Added</h1>
					<p>Sorry! Only one comment per person! You have already left a comment for this posting.</p>
					<input type="button" id="back" value="Back" onclick="history.back()">
					<input type="submit" id="viewFileCommentsText" name="viewFileCommentsText" value="View Posted Comments">';
				}
			}
			//Sends an error message if email address is not valid
			else{
				echo '<h1>Comments Not Added</h1>
				<h3>Email address is not valid!</h3>
				<input type="button" id="back" value="Back" onclick="history.back()">';
			}
		}
		//Sends an error message if any fields are empty
		else{
			echo '<h1>Comments Not Added</h1>
			<h3>You are missing the following fields:</h3><ul>';
			if (empty($_POST['name'])){
				echo '<li>Name</li>';
			}
			if (empty($_POST['email'])){
				echo '<li>Email</li>';
			}
			if (empty($_POST['commentbox'])){
				echo '<li>Comment</li>';
			}
			echo '</ul><input type="button" id="back" value="Back" onclick="history.back()">'; 
		}
		
	}
	
	//For viewing comments
	if (isset($_POST['viewFileCommentsText']) || isset($_POST['sortAscendingText']) || isset($_POST['sortDescendingText']) || isset($_POST['deleteText'])){
		
		//For comment deleting
		if (isset($_POST['deleteText'])){
			
			//Checks if POST value is empty
			if (!empty($_POST['indexArray'])){
				$nameSearch = $_POST['nameArray'];
				$emailSearch = $_POST['emailArray'];
				$commentsSearch = $_POST['commentsArray'];
				$index = $_POST['indexArray'];

				$deleteIndex = $_POST['deleteIndexText'];
				
				$arrayCount = count($nameSearch);
				
				//Checks if value is a proper int value
				if (is_int(intval($deleteIndex))){
					//Checks if the index is a valid index value
					if ($deleteIndex <= $arrayCount && $deleteIndex >= 1){
						$actualIndex = ($deleteIndex-1);
						
						//Runs function to map the file in an array and replace any value that meets the value
						$file = fopen("comments.txt","a+t");
						
							$commentsFile1 = file('comments.txt');

							function replace($commentsFile1){
								global $nameSearch, $emailSearch, $actualIndex;
								if (stristr($commentsFile1, $emailSearch[$actualIndex])){
									return " ";
								}
							return $commentsFile1;
							}
							
							$commentsFile1 = array_map('replace', $commentsFile1);
							file_put_contents('comments.txt', $commentsFile1);
							
						fclose($file);
						
		//If any of these checks fail, then it will send an error message:				
					}
					else{
						echo "Error: Must be a valid comment number!";
					}
				}
				else{
					echo "Error: Must be a valid comment number!";
				}
			}
			else{
				echo "Error: Must be a valid comment number!";
			}
		}
		
		//This will collect all everything line by line and store it in an array
		$file = fopen("comments.txt", "r+");
		$commentsArray = array();
		$count = 0;
		
		do{
			$commentsArray[$count] = fgets($file);
			$count++;
		}while (!feof($file));
		
		fclose($file);
		
		$count--;
		
		//Header page content
		echo '<h2>Huh?</h2>
			<p>Kirschner and Karpinski report that:<br>
			Students who used social networking sites while studying scored 20% lower on tests and students who used social media had an average GPA of 3.06 versus non-users who had an average GPA of 3.82.<br>
			Source: Paul A. Kirschner and Aryn C. Karpinski, "Facebook and Academic Performance," Computers in Human Behavior, Nov. 2010</p>
			<h1>Comments</h1><hr>';
			
		$commentsMultiArray = array();
		$maCount = 0;
		
		//Stores comments in multi array, it will also check if any of the lines were empty, which it will not record
		for ($x = 0; $x < $count; $x++){
			$commentsParse = explode(",", $commentsArray[$x]);
			//$commentsParse[0] = Name, $commentsParse[1] = Email, $commentsParse[2] = Comments
			
			if (str_word_count($commentsParse[0]) > 0 && str_word_count($commentsParse[1]) > 0 && str_word_count($commentsParse[2]) > 0){
				$record = array('name' => $commentsParse[0], 'email' => $commentsParse[1], 'comment' => $commentsParse[2]);
				array_push($commentsMultiArray, $record);
				$maCount++;
			}
		}
		
		//Ascend Sort
		if (isset($_POST['sortAscendingText'])){
			
			sort($commentsMultiArray);
			
		}
		
		//Descend Sort
		if (isset($_POST['sortDescendingText'])){
			
			rsort($commentsMultiArray);
			
		}
		
		//Displays all the entries if there are any entries
		if (!empty($commentsMultiArray)){
			for ($x = 0; $x < $maCount; $x++){
				echo '<p id="numberlist">'.($x+1).'.&nbsp&nbsp&nbsp&nbsp <b>Name:</b> <a href="mailto:'.$commentsMultiArray[$x]['email'].'">'.$commentsMultiArray[$x]['name'].'</a><br>
				<b>Comment:</b> '.$commentsMultiArray[$x]['comment'].'</p><hr>';
				
				echo '<input type="hidden" name="nameArray[]" value="'.$commentsMultiArray[$x]['name'].'">
				<input type="hidden" name="emailArray[]" value="'.$commentsMultiArray[$x]['email'].'">
				<input type="hidden" name="commentsArray[]" value="'.$commentsMultiArray[$x]['comment'].'">
				<input type="hidden" name="indexArray[]" value="'.($x+1).'">';
			}
		}
		
		echo '<br><input type="submit" id="TextFileVersion2" name="TextFileVersion" value="Add New Comment"><br>
		<input type="submit" id="sortAscendingText" name="sortAscendingText" value="Sort Ascending (name)"><br>
		<input type="submit" id="sortDescendingText" name="sortDescendingText" value="Sort Descending (name)"><br>
		Delete Comment Number: <input type="text" id="deleteIndexText" name="deleteIndexText" size="1">
		<input type="submit" id="deleteText" name="deleteText" value="Delete">';
		
	}
	

?>
</form>