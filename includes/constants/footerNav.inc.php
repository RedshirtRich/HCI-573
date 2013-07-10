
<?php
	$url_self = $_SERVER['PHP_SELF'];

	if ($page == "welcome.inc.php"){
		echo "Welcome";
	}
	else {
		echo "<a href=\"".$url_self . "?p=welcome\">Welcome</a>";
	}

	echo " | ";

	// check logon status below, if not logged on, show dead links
	// unauthenticated users can only see "Welcome"
	if ($page == "lessons.inc.php" || $_SESSION['userName'] == '') {
		echo "Lessons";
	}
	else {
		echo "<a href=\"".$url_self . "?p=lessons\">Lessons</a>";
	}

?>