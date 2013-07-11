
<?php
$url_self = $_SERVER['PHP_SELF'];

if ($pageWeekNumber == 1){
	echo "<div id=\"navHeaderButtonSelected\">Week 1</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week1\">Week 1</a></div>";
}

if ($pageWeekNumber == 2){
	echo "<div id=\"navHeaderButtonSelected\">Week 2</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week2\">Week 2</a></div>";
}

if ($pageWeekNumber == 3){
	echo "<div id=\"navHeaderButtonSelected\">Week 3</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week3\">Week 3</a></div>";
}

if ($pageWeekNumber == 4){
	echo "<div id=\"navHeaderButtonSelected\">Week 4</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week4\">Week 4</a></div>";
}

if ($pageWeekNumber == 5){
	echo "<div id=\"navHeaderButtonSelected\">Week 5</div>";
}
else {
	echo "<div id=\"navHeaderButton\"><a href=\"".$url_self . "?p=lessons&w=week5\">Week 5</a></div>";
}

?>