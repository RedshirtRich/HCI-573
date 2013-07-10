
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

// echo " | ";

// if ($page == "insertData.inc.php" || $_SESSION['userName'] == '') {
// 	echo "Insert Data";
// }
// else {
// 	echo "<a href=\"".$url_self . "?p=insert\">Insert Data</a>";
// }

// echo " | ";

// if ($page == "browseData.inc.php" || $_SESSION['userName'] == '') {
// 	echo "Browse Data";
// }
// else {
// 	echo "<a href=\"".$url_self . "?p=browse\">Browse Data</a>";
// }

// echo " | ";

// if ($page == "chartPage.inc.php" || $_SESSION['userName'] == '') {
// 	echo "Chart";
// }
// else {
// 	echo "<a href=\"".$url_self . "?p=chart\">Chart</a>";
// }

// echo " | ";

// if ($page == "about.inc.php" || $_SESSION['userName'] == '') {
// 	echo "About";
// }
// else {
// 	echo "<a href=\"".$url_self . "?p=about\">About</a>";
// }

?>