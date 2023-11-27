<!DOCTYPE html>
<!-- Created by Basil Ali on 07/16/2023 for IT-207 / Lab 4 -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 4</title>
	<link rel="stylesheet" href="/~bali7/IT207/css/lab4style.css" type="text/css">
	<link rel="icon" type="image/x-icon" href="/~bali7/IT207/images/favicon.ico">
</head>
<body>

<div class="row">
	<div class="side">
		<!-- Adds menu include script -->
		<?php include ('../menu.php') ?>
	</div>
	<div class="main">
		<div class="maintwo">
			<div>
				<div class="box-1">
				<!-- Adds course include script -->
					<?php include ('../course.php') ?>
				</div>
				<div class="box-4">
				<!-- Adds name information include script -->
					<?php include ('../name.php') ?>
				</div>
			</div>
		</div>
		<div class="mainthree">
			<div>
			<!-- Start of dynamic page content -->
				<?php
					//When page first loads, it will default to the TextFileVersion first
					$hide = 0;
					if (!isset($_POST['addText']) && !isset($_POST['addSQL']) && !isset($_POST['SQLversion']) && !isset($_POST['TextFileVersion'])){
						$version = 1;
					}
					if (isset($_POST['SQLversion'])){
						$version = 2;
					}
					if (isset($_POST['TextFileVersion'])){
						$version = 1;
					}
					if (isset($_POST['addSQL']) || isset($_POST['addText']) || isset($_POST['sortAscendingText']) || isset($_POST['sortDescendingText']) || isset($_POST['deleteText']) || isset($_POST['sortAscendingSQL']) || isset($_POST['sortDescendingSQL']) || isset($_POST['deleteSQL'])){
						$hide = 1;
						if (isset($_POST['addText']) || isset($_POST['sortAscendingText']) || isset($_POST['sortDescendingText']) || isset($_POST['deleteText'])){
							include ('commentfile.php');
						}
						if (isset($_POST['addSQL']) || isset($_POST['sortAscendingSQL']) || isset($_POST['sortDescendingSQL']) || isset($_POST['deleteSQL'])){
							include ('commentsql.php');
						}
					}
					if (isset($_POST['viewFileCommentsText']) || isset($_POST['viewFileCommentsSQL'])){
						$hide = 1;
						if (isset($_POST['viewFileCommentsText'])){
							include ('commentfile.php');
						}
						if (isset($_POST['viewFileCommentsSQL'])){
							include ('commentsql.php');
						}
					}
					if ($hide == 0){
						include ('form.php');
					}
				?>
			<!-- End of dynamic page content -->
			</div>
		</div>
		<div class="mainfooter">
			<div>
				<!-- Adds footer script -->
				<?php include ('../footer.php') ?>
			</div>
		</div>
  </div>
</div>
</body>
</html>
