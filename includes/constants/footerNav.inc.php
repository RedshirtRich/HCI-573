
<?php
	$url_self = $_SERVER['PHP_SELF'];

	if ($page == "welcome.inc.php"){
		echo "<div id=\"navSmallHeaderButtonSelected\">Welcome</div>";
	}
	else {
		echo "<div id=\"navSmallHeaderButton\"><a href=\"".$url_self . "?p=welcome\">Welcome</a></div>";
	}

	// check logon status below, if not logged on, show dead links
	// unauthenticated users can only see "Welcome"
	if ($page == "lessons.inc.php" || $_SESSION['userName'] == '') {
		echo "<div id=\"navSmallHeaderButtonSelected\">Lessons</div>";
	}
	else {
		echo "<div id=\"navSmallHeaderButton\"><a href=\"".$url_self . "?p=lessons\">Lessons</a></div>";
	}

?>