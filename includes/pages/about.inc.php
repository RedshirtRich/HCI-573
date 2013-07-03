<?php
//Determine if this page was called directly, if so, redirect
if (!defined('BASE')) {
	//Include the constants file
	require_once('../constants/dbc.php');

	//Redirect to main
	$url = BASE . "/HW4_rwtanner.php";
	header("Location: $url");
	exit;
}
?>
<h2>About</h2>

<p>Here you will find my thoughts on this assignment.</p>

<div id="divContainer">

	<br>
	<br>
	This assignment is finally DONE.  This was a more difficult assignment, due largely to the many pieces involved.  I had originally though this would be easier, and had started with most of the code I wrote for the previous assignment, re-using the MySQL pieces and forms.  However, closer inspection of the instructions made me realize that the database pieces would have to be rewritten to use AJAX calls, which set me back a few steps.  I didn't have too many problems switching to the AJAX calls, but it did take more time.  I had some difficulty getting the Highcharts libraries up and running, as the implementation is VERY particular about how and where the charts are called.  Once I finally got a sample chart up and running, it wasn't too difficult to parse through my data and replace the sample charts with something meaningful.  As usual, I spent a large amount of time playing in CSS, tinkering with new looks and colors.  I have been trying to reuse CSS through the assignments, in an effort to minimize my time 'lost' playing with the settings, but I just can't help myself.  All of the assignment goals were met, with much of the code being written at tables between WWDC sessions at the Moscone Convention Center in San Francisco, CA.

</div>