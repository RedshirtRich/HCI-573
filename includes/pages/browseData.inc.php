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

<h2>Browse Data</h2>

<p>Welcome to the mini-blog for beginning webDevs.</p>

<div id="divBlogArchiveContainer">
	<br>

	<script language="JavaScript" type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>

	<script language="JavaScript" type="text/javascript">
		//autorefresh every 2000 milisecond
		var auto_refresh = setInterval(function() {
			$('#load_msgs').fadeIn(1000).show().load('get_blogs.php');
		}, 2000); //Refresh every 2000 milliseconds

	</script>

	<div id="load_msgs" style="display:none;"></div>

</div>