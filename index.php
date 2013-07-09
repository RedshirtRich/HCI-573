<?php

/*

	Final Project for HCI 573
	"Sustainable Journey"
	
	Mengduo Ma 			- mamengduo@gmail.com
	Michelle Blomberg	- michelle.blomberg@gmail.com
	Rich Tanner 		- rwtanner@iastate.edu

*/

	// turning on PHP error debugging console
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

//Include the database and constants file
require_once 'includes/constants/dbc.php';
require_once 'includes/constants/sql_constants.php';

session_start();

if (!isset($_SESSION['userName'])) {
	$_SESSION['userName'] = '';
	$_SESSION['userID'] = '';
	$_SESSION['userType'] = '';
	$_SESSION['memberSince'] = '';
	$_SESSION['pointsEarned'] = '';
}

//Determine if a page was actually called -- essentially checks if the URL has ?p=something, or if the variable was passed as POST data
if (isset($_GET['p']) or isset($_POST['p'])) {
	//Page called, so assign it to the variable $page
	$page = $_GET['p'];
} else {
	//No page called, pass $page as NULL variable
	$page = NULL;
}

//Grab the page to display (if called)
switch ($page) {

	case "welcome":
	$page = "welcome.inc.php";
	$title = "Welcome! Log In or Register";
	break;

	// this should NOT be in the navBar, but is accessable ONLY from the logon div
	case "register":
	$page = "register.inc.php";
	$title = "Register";
	break;
	
	case "insert":
	$page = "insertData.inc.php";
	$title = "Insert Data";
	break;

	case "browse":
	$page = "browseData.inc.php";
	$title = "Browse Data";
	break;
	
	case "chart":
	$page = "chartPage.inc.php";
	$title = "Chart";
	break;

	case "about":
	$page = "about.inc.php";
	$title = "About";
	break;

	//Set a default page if $page = NULL
	//This is our "home" page, hit by simply going to our .index page
	default:
	$page = "welcome.inc.php";
	$title = "Welcome! Log In or Register";
	break;
}
?>

<html>
	<head>
		<link href="<?php echo BASE; ?>/includes/styles/style.css" rel="stylesheet" type="text/css">
		<?php echo "<title>" . $title . "</title>"; ?>
	</head>

	<body>
		<center>

<!-- create a new div to hold our content -->
		<div id="divParent">

			<!-- include footer here -->
			<?php include 'includes/constants/header.inc.php';?>
	
			<?php
			//checks if the file does not exist
			if (!file_exists("includes/pages/".$page)) {
				$page = "main.inc.php";
				$title = "You didn't call a valid page.";
			}
			?>

			<!-- Include the page that was called (or default if none) -->
			<?php include "includes/pages/" . $page; ?>

			<div id="divFooterContainer">
				<!-- Include a footer (with links) -->
				<?php include "includes/constants/footerNav.inc.php"; ?>
				<br>
				<br>
				<!-- include footer here -->
				<?php include 'includes/constants/footer.inc.php';?>
			</div>
		</div>
	</body>
</html>