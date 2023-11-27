<!DOCTYPE html>
<!-- Created by Basil Ali on 07/25/2023 for IT-207 / Practicum 2 -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta charset="utf-8">
	<title>Practicum 2</title>
	<link rel="stylesheet" href="/~bali7/IT207/css/labp2style.css" type="text/css">
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
					$submitSection = 0;
					if (isset($_POST['submit'])){
						$submitSection = 1;
					}
					include ('quiz.php');
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
