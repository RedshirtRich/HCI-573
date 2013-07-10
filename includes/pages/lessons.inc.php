<?php
//Determine if this page was called directly, if so, redirect
if (!defined('BASE')) {
	//Include the constants file
	require_once('../constants/dbc.php');

	//Redirect to main
	$url = BASE . "/index.php";
	header("Location: $url");
	exit;
}
?>

<?php
	//Determine if a page was actually called -- essentially checks if the URL has ?w=something, or if the variable was passed as POST data
	if (isset($_GET['w']) or isset($_POST['w'])) {
		//Page called, so assign it to the variable $page
		$weekSelected = $_GET['w'];
	} else {
		//No page called, pass $page as NULL variable
		$weekSelected = NULL;
	}

	//Grab the page to display (if called)
	switch ($weekSelected) {

		// the below are accessable from the NavBar
		case "week1":
		$weekPage = "week1.inc.php";
		break;

		case "week2":
		$weekPage = "week2.inc.php";
		break;

		case "week3":
		$weekPage = "week3.inc.php";
		break;

		case "week4":
		$weekPage = "week4.inc.php";
		break;

		case "week5":
		$weekPage = "week5.inc.php";
		break;

		//Set a default page if $selectedWeek = NULL
		default:
		$weekPage = "week1.inc.php";
		break;
	}
?>

<!-- SEPARATE VIEWS BASED ON USER TYPE -->
<!-- KIDS PORTAL VIEW BELOW -->

<?php 
	if ($_SESSION['userType'] == 2) {
		echo "<div id=\"divContainer\">";

			echo "<h2>Weekly Lessons</h2>";

			echo "<div id=\"divLessonsNavHeader\">";
				include "includes/constants/lessonsNav.inc.php";
			echo "</div>";

			// Grab our selected week lesson page
			//checks if the file does not exist
			if (!file_exists("includes/pages/".$weekPage)) {
				$weekPage = "main.inc.php";
				$weekPage = "You didn't call a valid page.";
			}
			// Include the page that was called (or default if none)
			include "includes/pages/" . $weekPage; 

		echo "</div>";
	}
?>

<!-- PARENT/TEACHER PORTAL VIEW BELOW -->

<?php 
	if ($_SESSION['userType'] == 1) {
		echo "<div id=\"divContainer\">";

			echo "<h2>Preview Weekly Lessons For Your Child</h2>";

			echo "<div id=\"divLessonsNavHeader\">";
				include "includes/constants/lessonsNav.inc.php";
			echo "</div>";

			// Grab our selected week lesson page
			//checks if the file does not exist
			if (!file_exists("includes/pages/".$weekPage)) {
				$weekPage = "main.inc.php";
				$weekPage = "You didn't call a valid page.";
			}
			// Include the page that was called (or default if none)
			include "includes/pages/" . $weekPage; 

		echo "</div>";
	}
?>

