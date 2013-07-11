<?php 

	require_once 'includes/constants/dbc.php';
	require_once 'includes/constants/sql_constants.php';

	//Connect to MySQL Server
	$con = mysql_connect($dbhost, $dbuser, $dbpass);

	//check to see if database exists
	$select = mysql_select_db($dbname);

	// if database does NOT exist, let's create it
	if (!$select) {
		$create = mysql_query("CREATE DATABASE $dbname") or die(mysql_error());
	}

	// now select it
	$select = mysql_select_db($dbname);

	// we should have a database now.  Check for the table
	// and run setup query 
	$sql  = "SELECT * FROM $lessons_table_name";
	$result = mysql_query($sql,$con);
	if ($result) {
		// echo "we have that table";
	} else {
		//an SQL query for creating our table
		$sql = "CREATE TABLE IF NOT EXISTS $lessons_table_name (
			PageID INT NOT NULL,
			Points INT,
			CourseName CHAR(20),
			UnitID INT,
			UnitName CHAR(60),
			LectureName CHAR(60), 
			TextInfoPurpose CHAR(255),
			TextInfoAction1 CHAR(255),
			TextInfoAction2 CHAR(255),
			TextInfoAction3 CHAR(255),
			TextInfoAction4 CHAR(255),
			TextInfoMaterial CHAR(255),
			TextInfoTime CHAR(255),
			ImageInfoTime CHAR(255),
			VideoInfo CHAR(255),
			ImageInfoGuider CHAR(255),
			ImageMaterial1 CHAR(255),
			ImageMaterial2 CHAR(255),
			ImageMaterial3 CHAR(255),
			
			PRIMARY KEY(PageID)
		)";

		// Execute query to create table
		$create = mysql_query($sql,$con);

		// ---------------------------------------------- //
		// PROTOTYPE TEST CODE
		// Run another query to insert our default lessons from our csv file
		$sql = "LOAD DATA LOCAL INFILE 'sj_lessons.csv' INTO TABLE $lessons_table_name FIELDS TERMINATED BY '$' ENCLOSED BY '^' LINES TERMINATED BY '\\n' (PageID, Points, CourseName, UnitID, UnitName, LectureName, TextInfoPurpose, TextInfoAction1, TextInfoAction2, TextInfoAction3, TextInfoAction4, TextInfoMaterial, TextInfoTime, ImageInfoTime, VideoInfo, ImageInfoGuider, ImageMaterial1, ImageMaterial2, ImageMaterial3) ";
		// execute the insert query
		$insertDefaults = mysql_query($sql,$con) or die(mysql_error());

		// ---------------------------------------------- //
	}

	// NOW, we just have to save the data away to user defaults... maybe week lesson at a time?

	// We KNOW we have data now, so go get it, week at a time
	$sql  = "SELECT * FROM $lessons_table_name WHERE ";
	$result = mysql_query($sql,$con);


	//IF LESSONS LOCATED, SAVE ALL DETAILS TO SESSION VALUES
	// if (mysql_num_rows($result) != 0) {
	//     //output start of results
	    
	//     while ($row2 = mysql_fetch_array($result)) {
	//     	// // enter cool id tags on these values to make it look pretty via CSS
	//     	// echo "<div id=\"blogDiv\">";
	//      //    echo "<p id=\"blogTitle\">\"".($row2['CourseName'])."\"</p>";
	//      //    echo "<p id=\"blogAuthor\"> By: ". $row2['UnitName']."</p>";
	//      //    echo "<p id=\"blogContent\">".($row2['LectureName'])."</p>";
	//      //    echo "<p id=\"blogDate\">".($row2['Points'])."</p>";
	//      //    echo "</div>";
	//      //    echo "<br>";
	//     }
	// }
?>