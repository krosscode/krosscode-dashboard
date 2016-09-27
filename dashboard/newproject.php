<?php
	if (isset($_POST["submit"])) {
		$newProjectDir = strtolower(str_replace(" ", "_", $_POST["projectName"]));
		$newProjectDisplayName = (isset($_POST["projectDisplayName"]) ? $_POST["projectDisplayName"] : $newProjectDir);

		if(file_exists("../$newProjectDir")) {
			$error = "Folder already exists. Enter another name.";
		} else {
			$source = "template";
			$dest= "../$newProjectDir";

			mkdir($dest);
			foreach ($iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST) as $item) {
				if ($item->isDir()) {
					mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
				} else {
					copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
				}
			}

			header("Location: index.php");
		}

	}
?>
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
				<h2 id="dashboardHeader__subBar__heading"><a href="index.php" class="breadcrumbs">Home &raquo;</a> New Project &raquo;</h2>
			</div>
		</header>
	
		<main id="dashboardContentContainer">
			<form id="dashboardNewProjectForm" method="post">
				<?php
					if (isset($error)) {
						echo "<h2>$error</h2>";
					}
				?>
				<label for="projectName">Project folder name *</label><br>
				<input autofocus required type="text" name="projectName" id="projectName">
				<br><br>
				<input type="submit" name="submit" id="submit">
			</form>
		</main>
	
		<footer id="dashboardFooter">
			<p>Created by Sean Krossing - <?php echo date("Y"); ?></p>
		</footer>
	</div>
</body>
</html>