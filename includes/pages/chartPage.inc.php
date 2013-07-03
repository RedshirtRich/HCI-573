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

<?php 
//** GO GRAB THE DATA **//

// Connect to MySQL Server
$con = mysql_connect($dbhost, $dbuser, $dbpass);

//check to see if database exists
$select = mysql_select_db($dbname);

//fetch it all!
$pagesql2 = "SELECT * FROM ". $table_name ." ORDER BY EntryTime";
$result2 = mysql_query($pagesql2) or die("Invalid query: " . mysql_error());
//IF BLOGS LOCATED, SHOW ALL BLOG DETAILS
if (mysql_num_rows($result2) != 0) {
    //output start of results
    while ($row2 = mysql_fetch_array($result2)) {
   		$blogWordCount[] = str_word_count($row2['Blog']);
   		$blogAuthors[] = $row2['Name'];
	}
}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="includes/js/highcharts.js"></script>
		<script src="includes/js/modules/exporting.js"></script>
		<script type="text/javascript">

		$(function () {
        $('#divChartContainer').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Words Written per Blog Entry'
            },
            subtitle: {
                text: 'Blogs not grouped for contributors with multiple blog posts.'
            },
            xAxis: {
	            categories: [<?php echo "'".join($blogAuthors, "','")."'"; ?>]
	        },
	        yAxis: {
	            title: {
	                text: 'Words Written'
	            }
	        },
            series: [{
            	name: 'Words per Blog',
                data: [<?php echo join($blogWordCount, ',') ?>]
            }]
        });
    });
    

	</script>
</head>


<h2>Charts</h2>

<p>The bar chart below represents the verbosity of this blog's contributors.</p>

	<body>


<div id="divChartContainer"></div>

	</body>
</html>
