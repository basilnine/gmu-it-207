<form action="lab4.php" method="post">
<?php

// MySQL Server Details
$hostname = "helios.cec.gmu.edu";
$username = "bali7";
$password = "meewheec";
$dbname = "bali7";
$connection = mysqli_connect($hostname, $username, $password, $dbname);

//If connection fails, send error, if not continue.
if ($connection->connect_error){
	die("Connection failed: ".$connection->connect_error);
}
else{
	//Add new entry
	if (isset($_POST['addSQL'])){
		
		//Checks to see if entries are not empty
		if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['commentbox'])){
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$comment = $_POST['commentbox'];
			
			//Checks to see if email entry is a valid email
			if (filter_var($email, FILTER_VALIDATE_EMAIL)){
				
				//Checks each row in the table to see if the email already exists in the database
				$sql = "SELECT email FROM LAB4";
				$valid = true;
				
				$result = $connection->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if ($row["email"] == $email){
							$valid = false;
						}
					}
				}
				
				//Adds new comment if validation check is passed
				if ($valid == true){
					
					//SQL query insert
					$SQLinsert = "Insert INTO LAB4 ".
					" (name, email, comment) VALUES ".
					' ("'.$name.'","'.$email.'","'.$comment.'")'; 
					
					$QueryResult = mysqli_query($connection, $SQLinsert);
					
					//If an error happens during submission, it will show, otherwise it will process a success notification
					if ($QueryResult === FALSE) {
						echo "<p> Unable to insert the data. </p>".
						"<p> Error code ".mysqli_errno($connection).
						": ".mysqli_error($connection)."</p>";
					}
					else{
						echo '<h1>Comments Added</h1>
						Name: <a href="mailto:'.$email.'">'.$name.'</a><br>
						Comment: '.$comment.'<br>
						<input type="button" id="back" value="Back" onclick="history.back()">
						<input type="submit" id="viewFileCommentsSQL" name="viewFileCommentsSQL" value="View Posted Comments">';
					}
				}
				//Sends error message if validation check is not passed
				else{
					echo '<h1>Comments Not Added</h1>
					<p>Sorry! Only one comment per person! You have already left a comment for this posting.</p>
					<input type="button" id="back" value="Back" onclick="history.back()">
					<input type="submit" id="viewFileCommentsSQL" name="viewFileCommentsSQL" value="View Posted Comments">';
				}
			}
			//Sends error message if email address is not valid
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
	
	if (isset($_POST['viewFileCommentsSQL']) || isset($_POST['sortAscendingSQL']) || isset($_POST['sortDescendingSQL']) || isset($_POST['deleteSQL'])){
		
		//For comment deleting
		if (isset($_POST['deleteSQL'])){
			
			//Checks if POST value is empty
			if (!empty($_POST['emailArray'])){
				
				$emailArray = $_POST['emailArray'];
				
				$deleteIndex = $_POST['deleteIndexSQL'];
				$arrayCount = count($emailArray);
				
				//Checks if the value is a proper int value
				if (is_int(intval($deleteIndex))){
					//Checks if the index is a valid index value
					if ($deleteIndex <= $arrayCount && $deleteIndex >= 1){
						$actualIndex = ($deleteIndex-1);
						
						$SQLquery = "DELETE FROM LAB4 WHERE email='".$emailArray[$actualIndex]."'";
						
						if ($connection->query($SQLquery) === FALSE){
							echo "An error has occured: ".$connection->error;
						}
					}
				}
				else{
					echo "Error: Must be a valid comment number!";
				}
				
			}else{
				echo "Error: Must be a valid comment number!";
			}
		}
		
		//Header page content
		echo '<h2>Huh?</h2>
		<p>Kirschner and Karpinski report that:<br>
		Students who used social networking sites while studying scored 20% lower on tests and students who used social media had an average GPA of 3.06 versus non-users who had an average GPA of 3.82.<br>
		Source: Paul A. Kirschner and Aryn C. Karpinski, "Facebook and Academic Performance," Computers in Human Behavior, Nov. 2010</p>
		<h1>Comments</h1><hr>';
		
		//Fetches each row from the SQL table
		$SQLquery = "";
		
		//Checks if sort is applicable, otherwise it will not sort
		if (isset($_POST['sortAscendingSQL'])){
			$SQLquery = "SELECT name, email, comment FROM LAB4 ORDER BY name ASC";
		}
		elseif (isset($_POST['sortDescendingSQL'])){
			$SQLquery = "SELECT name, email, comment FROM LAB4 ORDER BY name DESC";
		}
		else{
			$SQLquery = "SELECT name, email, comment FROM LAB4";
		}
		
		$result = $connection->query($SQLquery);
		$count = 0;
		
		//Displays all the entries if there are any entries and sets up to pass them for deletion processing
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				echo '<p id="numberlist">'.($count+1).'.&nbsp&nbsp&nbsp&nbsp <b>Name:</b> <a href="mailto:'.$row['email'].'">'.$row['name'].'</a><br>
				<b>Comment:</b> '.$row['comment'].'</p><hr>';
				
				echo '<input type="hidden" name="emailArray[]" value="'.$row['email'].'">
				<input type="hidden" name="indexArray[]" value="'.($count++).'">';
			}
		}
		
		echo '<br><input type="submit" id="SQLversion2" name="SQLversion" value="Add New Comment"><br>
		<input type="submit" id="sortAscendingSQL" name="sortAscendingSQL" value="Sort Ascending (name)"><br>
		<input type="submit" id="sortDescendingSQL" name="sortDescendingSQL" value="Sort Descending (name)"><br>
		Delete Comment Number: <input type="text" id="deleteIndexSQL" name="deleteIndexSQL" size="1">
		<input type="submit" id="deleteSQL" name="deleteSQL" value="Delete">';
	}
}


mysqli_close($connection);
?>
</form>