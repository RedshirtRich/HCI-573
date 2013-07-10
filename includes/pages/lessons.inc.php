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
<h2>Lessons</h2>

<p>____________________________________</p>

<div id="divContainer">

	<br>
	Lessons go in HERE
	<br>

</div>