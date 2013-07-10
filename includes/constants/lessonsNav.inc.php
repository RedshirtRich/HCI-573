
<?php
$url_self = $_SERVER['PHP_SELF'];

if ($weekPage == "week1.inc.php"){
	echo "<div id=\"navHeaderButtonSelected\">Week 1</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week1\">Week 1</a></div>";
}

if ($weekPage == "week2.inc.php"){
	echo "<div id=\"navHeaderButtonSelected\">Week 2</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week2\">Week 2</a></div>";
}

if ($weekPage == "week3.inc.php"){
	echo "<div id=\"navHeaderButtonSelected\">Week 3</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week3\">Week 3</a></div>";
}

if ($weekPage == "week4.inc.php"){
	echo "<div id=\"navHeaderButtonSelected\">Week 4</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week4\">Week 4</a></div>";
}

if ($weekPage == "week5.inc.php"){
	echo "<div id=\"navHeaderButtonSelected\">Week 5</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week5\">Week 5</a></div>";
}

?>