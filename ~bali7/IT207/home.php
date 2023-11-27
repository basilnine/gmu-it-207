<!DOCTYPE html>
<!-- Created by Basil Ali on 06/16/2023 for IT-207 / Lab Practice -->
<!-- Developed a homepage using an external CSS style, includes and PHP scripts -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="icon" type="image/x-icon" href="/~bali7/IT207/images/favicon.ico">
</head>
<body>

<div class="row">
	<div class="side">
		<!-- Adds menu include script -->
		<?php include 'menu.php' ?>
	</div>
	<div class="main">
		<div class="maintwo">
			<div>
				<div class="box-1">
				<!-- Adds course include script -->
					<?php include 'course.php' ?>
				</div>
				<div class="box-4">
				<!-- Adds name information include script -->
					<?php include 'name.php' ?>
				</div>
			</div>
		</div>
		<div class="mainthree">
			<div>
				<div class="box-5"> 
					<img src="images/self.png" alt="Portrait">
				<div class="box-2">
					<h2>Summary</h2>
						<h3>Personal</h3>
							<li>Avid PC Gamer</li>
							<li>Soccer Fan</li>
							<li>Sudanese Born</li>
							<li>Works at Missing Link</li>
						<h3>Academic</h3>
							<li>Transferred from NVCC in Summer 2022</li>
							<li>Graduation date on May 2024</li>
							<li>Undergrad in Information Technology</li>
							<li>Concentrating in Cybersecurity</li>
							</br>
				</div>
				</div>
				<div class="box-3">
					<h2>Professional</h2>
					<p>Took a five year gap in 2016 to save money for school and to develop my customer experience, management, 
					and software development skills. I was involved in software development projects for indie game and game restoration
					projects, where I developed my programming and project management skills. I started to work on software and network 
					security for recent game projects and found a unique interest in cybersecurity. Obtained my Security+ certification
					on May 2021 and returned back to NVCC to finish my associate's degree in Information Technology. To which I transferred
					to George Mason University just in time for Summer 2022 classes to start. I expect to graduate from George Mason on May 2024
					with a B.S. in Information Technology concentrating in Cybersecurity. I currently work at a start-up podcast media company
					called "Missing Link," where I act as their IT technical support specialist and assist them with maintaining their website,
					cloud services, and other technical equipment. I also intern this summer with the Federal Government, assisting them with 
					their capabilities.</p>
					<h2>Personal</h2>
					<p>Born in Khartoum, Sudan, I had left to the United States as a one year old child and had been raised in the Arlington, VA 
					area for about 24 years. Ever since I had access to my first computer when I was 8 years old, I was always very curious with
					how computers work and loved to tinker and mess around with the hardware and software of my computer. My father and I love to 
					watch and play soccer, as well as enjoy playing video games together. I learned how to write in PHP and HTML when I was 12 and 
					involved myself in indie game development when I was 16. A lot of my software development and understanding of computers and 
					technology was due to my love of PC games and learning how to develop my own games. I currently live with my partner in Virginia 
					and I'm continuing my journey into the Cybersecurity field, as I learn more about different roles and become more involved so I can
					find myself in a career that I will not only be good at, but be happy in.
				</div>
			</div>
		</div>
		<div class="mainfooter">
			<div>
				<!-- Adds footer script -->
				<?php include 'footer.php' ?>
			</div>
		</div>
  </div>
</div>

</body>
</html>
