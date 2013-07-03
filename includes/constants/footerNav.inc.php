
<?php
$url_self = $_SERVER['PHP_SELF'];


// 1. Using a page template (e.g., the example in lecture 8), create a site with 3 content areas: "Insert Data", "Browse Data", "Chart", and "About". 
		// Your template should include either a footer or a side navigation bar. 

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