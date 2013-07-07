
<?php
$url_self = $_SERVER['PHP_SELF'];

if ($page == "welcome.inc.php"){
	echo "Welcome";
}
else {
	echo "<a href=\"".$url_self . "?p=welcome\">Welcome</a>";
}

echo " | ";

if ($page == "insertData.inc.php"){
	echo "Insert Data";
}
else {
	echo "<a href=\"".$url_self . "?p=insert\">Insert Data</a>";
}

echo " | ";

if ($page == "browseData.inc.php"){
	echo "Browse Data";
}
else {
	echo "<a href=\"".$url_self . "?p=browse\">Browse Data</a>";
}

echo " | ";

if ($page == "chartPage.inc.php"){
	echo "Chart";
}
else {
	echo "<a href=\"".$url_self . "?p=chart\">Chart</a>";
}

echo " | ";

if ($page == "about.inc.php"){
	echo "About";
}
else {
	echo "<a href=\"".$url_self . "?p=about\">About</a>";
}

?>