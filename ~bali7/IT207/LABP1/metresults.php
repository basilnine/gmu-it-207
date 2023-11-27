<!DOCTYPE html>
<!-- Created by Basil Ali on 06/27/2023 for IT-207 / Lab Practicum -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta charset="utf-8">
	<title>Practicum 1</title>
	<link rel="stylesheet" href="/~bali7/IT207/css/labp1style.css" type="text/css">
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
				<?php include ('formresults1.php') ?>
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
