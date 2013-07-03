<script language="JavaScript" type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>


<?php 

	require_once 'includes/constants/dbc.php';
	require_once 'includes/constants/sql_constants.php';

	//Connect to MySQL Server
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
	    	// enter cool id tags on these values to make it look pretty via CSS
	    	echo "<div id=\"blogDiv\">";
	        echo "<p id=\"blogTitle\">\"".($row2['Title'])."\"</p>";
	        echo "<p id=\"blogAuthor\"> By: ". $row2['Name']."</p>";
	        echo "<p id=\"blogContent\">".($row2['Blog'])."</p>";
	        echo "<p id=\"blogDate\">".($row2['EntryTime'])."</p>";
	        echo "</div>";
	        echo "<br>";
	    }
	}
?>