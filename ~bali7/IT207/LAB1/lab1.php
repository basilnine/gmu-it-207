<!DOCTYPE html>
<!-- Created by Basil Ali on 06/19/2023 for IT-207 / Lab Practice -->
<!-- 6/19/2023: Started with a template for Lab 1 -->
<!-- 6/22/2023: Added form with POST processing hiding -->
<!-- 6/23/2023: Adjusted form with two-page processing -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 1</title>
	<link rel="stylesheet" href="/~bali7/IT207/css/lab1style.css" type="text/css">
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
				<?php include ('form.php') ?>
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
