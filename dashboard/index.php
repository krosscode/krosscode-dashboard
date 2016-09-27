<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Charset -->
	<meta charset="UTF-8">

	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Styling -->
	<link rel="stylesheet" href="css/dashboard_style.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400|Roboto+Condensed" rel="stylesheet">

	<!-- Title -->
	<title>KrossCode Dashboard</title>
</head>
<body>
	<div id="flexContainer">
		<header id="dashboardHeader">
			<div id="dashboardHeader__mainBar">
				<h1 id="dashboardHeader__mainBar__heading"><strong>KROSS</strong>CODE <strong>DASH</strong>BOARD</h1>
			</div>
	
			<div id="dashboardHeader__subBar">
				<h2 id="dashboardHeader__subBar__heading">Home &raquo;</h2>
			</div>
		</header>
	
		<main id="dashboardContentContainer">
				<div id="projectList">
					<?php
						// List of dirs to not show in Current Projects.
						$dirBlacklist = array("dashboard");
						// List all folders as links.
						foreach(glob('../*', GLOB_ONLYDIR) as $dir) {
							$dir = substr($dir, 3);
							$defaultName = str_replace("_", " ", $dir);
							if (!in_array($dir, $dirBlacklist)) {
								$color = substr(md5(rand()), 0, 6);
								echo "<div class='project' style='background-color:#$color'>";
								echo "<div class='widthAsHeight'></div>";
								echo "<a href='../$dir' class='projectLink'>";
								echo "<div class='projectTitle'>$defaultName<span class='projectTitleArrow'>&raquo;</span></div>";
								echo "</a>";
								echo "</div>";
							}
						}
					?>

					<div class="project" style="background-color:#111;">
						<div class="widthAsHeight"></div>
						<a href="newproject.php" class="projectLink">
							<span class="projectTitle" style="color:hsl(0, 0%, 50%);">New Project<span class="projectTitleArrow">&plus;</span></span>
						</a>
					</div>
				</div>
		</main>
	
		<footer id="dashboardFooter">
			<p>Created by Sean Krossing - <?php echo date("Y"); ?></p>
		</footer>
	</div>
</body>
</html>