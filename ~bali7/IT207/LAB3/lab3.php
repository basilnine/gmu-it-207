<!DOCTYPE html>
<!-- Created by Basil Ali on 07/09/2023 for IT-207 / Lab 3 -->
<!-- 07/05/2023 - Added PHP script and processing for calendar.php and setup.php -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 3</title>
	<link rel="stylesheet" href="/~bali7/IT207/css/lab3style.css" type="text/css">
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
					//When page first loads, it will bring up setup.php, if submission is made, then calendar.php will show and will hide setup.php
					$hide = 0;
					if (isset($_POST['search']) || isset($_POST['add']) || isset($_POST['update'])){
						$hide = $_POST['hide'];
						if ($hide == 1){
							include ('contact.php');
						}
					}
					if ($hide == 0){
						include ('search.php');
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
