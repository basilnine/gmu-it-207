<form action="lab4.php" method="post">

	<h2>Huh?</h2>
	<p>Kirschner and Karpinski report that:<br>
	Students who used social networking sites while studying scored 20% lower on tests and students who used social media had an average GPA of 3.06 versus non-users who had an average GPA of 3.82.<br>
	Source: Paul A. Kirschner and Aryn C. Karpinski, "Facebook and Academic Performance," Computers in Human Behavior, Nov. 2010</p>
	<h1>Add Comments</h1>
	<?php
		if ($version == 1){
			echo '<h3>Text File Version</h3>
			<label for="name">Name:</label><br>
			<input type="text" id="name" name="name"><br>
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email"><br>
			<label for="commentbox">Comment:</label><br>
			<textarea id="commentbox" name="commentbox" rows="4" cols="50"></textarea><br>
			<input type="submit" id="addText" name="addText" value="Sign">
			<input type="reset" value="Reset Form">
			<input type="submit" id="viewFileCommentsText" name="viewFileCommentsText" value="View Comments">
			<br><input type="submit" id="SQLversion" name="SQLversion" value="SQL Version">';			
		}
		if ($version == 2){
			echo '<h3>SQL Version</h3>
			<label for="name">Name:</label><br>
			<input type="text" id="name" name="name"><br>
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email"><br>
			<label for="commentbox">Comment:</label><br>
			<textarea id="commentbox" name="commentbox" rows="4" cols="50"></textarea><br>
			<input type="submit" id="addSQL" name="addSQL" value="Sign">
			<input type="reset" value="Reset Form">
			<input type="submit" id="viewFileCommentsSQL" name="viewFileCommentsSQL" value="View Comments">
			<br><input type="submit" id="TextFileVersion" name="TextFileVersion" value="Text File Version">';		
		}
	?>
</form>