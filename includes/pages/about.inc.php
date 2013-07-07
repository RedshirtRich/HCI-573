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
<h2>About</h2>

<p>The journey toward Sustainable Journey</p>

<div id="divContainer">

	<br>
	<br>
	We need to really jazz up the look of this very simple looking template.  I would love to get our site up quickly, as far as basic functionality goes, and then have time to play with CSS like crazy. <br> <br> We also need to talk about who is going to do the video presentation.  I don't know if I will have time for that, but if Michelle, who's vision this was, would like the chance to convey her vision and her passion about the content, I think that would be a good thing to display.

</div>