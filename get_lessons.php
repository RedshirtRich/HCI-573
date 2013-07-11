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
			TextInfoPurpose TEXT,
			TextInfoAction1 TEXT,
			TextInfoAction2 TEXT,
			TextInfoAction3 TEXT,
			TextInfoAction4 TEXT,
			TextInfoMaterial TEXT,
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

	// We KNOW we have data now, so go get it, week at a time
	// ---------- GET THE WEEK PASSED IN BY OUR CALLING PAGE ---------- //
	$sql  = "SELECT * FROM $lessons_table_name WHERE UnitID = '$pageWeekNumber'";
	$result = mysql_query($sql,$con);


	//IF LESSONS LOCATED, SAVE ALL DETAILS TO PHP VALUES
	// Except for Week 5, all lessons have 11 rows
	if (mysql_num_rows($result) != 0) {
	    $i = 0;
	    while ($row = mysql_fetch_array($result)) {
	    	if ($i == 0) { // first row
	    		// first row gives us our title and has all our guide info
	    		$weekLessonTitle = ($row['UnitName']); 
	    		$yourGuide = ($row['LectureName']);
	    		$guideInfo = ($row['TextInfoPurpose']);
				$videoLink1 = ($row['VideoInfo']);
				$imageGuider1 = ($row['ImageInfoGuider']);

	  //   	} else if ($i == 2) { // second row
	  //   		$weekLessonTitle = ($row['UnitName']); 
	  //   		$yourGuide = ($row['UnitName']);
	  //   		$lectureName1 = ($row['LectureName']);
	  //   		$infoPurpose1 = ($row['TextInfoPurpose']);
	  //   		$action1_1 = ($row['TextInfoAction1']);
	  //   		$action1_2 = ($row['TextInfoAction2']);
	  //   		$action1_3 = ($row['TextInfoAction3']);
	  //   		$action1_4 = ($row['TextInfoAction4']);
	  //   		$material1 = ($row['TextInfoMaterial']);
			// 	$infoTime1 = ($row['TextInfoTime']);
			// 	$imageTime1 = ($row['ImageInfoTime']);
			// 	$videoLink1 = ($row['VideoInfo']);
			// 	$imageGuider1 = ($row['ImageInfoGuider']);
			// 	$infoMaterial1_1 = ($row['ImageMaterial1']);
			// 	$infoMaterial1_2 = ($row['ImageMaterial2']);
			// 	$infoMaterial1_3 = ($row['ImageMaterial3']);

   //  		} else if ($i == 3) { // third row
   //  			$weekLessonTitle = ($row['UnitName']); 
	  //   		$yourGuide = ($row['UnitName']);
	  //   		$lectureName1 = ($row['LectureName']);
	  //   		$infoPurpose1 = ($row['TextInfoPurpose']);
	  //   		$action1_1 = ($row['TextInfoAction1']);
	  //   		$action1_2 = ($row['TextInfoAction2']);
	  //   		$action1_3 = ($row['TextInfoAction3']);
	  //   		$action1_4 = ($row['TextInfoAction4']);
	  //   		$material1 = ($row['TextInfoMaterial']);
			// 	$infoTime1 = ($row['TextInfoTime']);
			// 	$imageTime1 = ($row['ImageInfoTime']);
			// 	$videoLink1 = ($row['VideoInfo']);
			// 	$imageGuider1 = ($row['ImageInfoGuider']);
			// 	$infoMaterial1_1 = ($row['ImageMaterial1']);
			// 	$infoMaterial1_2 = ($row['ImageMaterial2']);
			// 	$infoMaterial1_3 = ($row['ImageMaterial3']);

			// } else if ($i == 4) { // fourth row
			// 	$weekLessonTitle = ($row['UnitName']); 
	  //   		$yourGuide = ($row['UnitName']);
	  //   		$lectureName1 = ($row['LectureName']);
	  //   		$infoPurpose1 = ($row['TextInfoPurpose']);
	  //   		$action1_1 = ($row['TextInfoAction1']);
	  //   		$action1_2 = ($row['TextInfoAction2']);
	  //   		$action1_3 = ($row['TextInfoAction3']);
	  //   		$action1_4 = ($row['TextInfoAction4']);
	  //   		$material1 = ($row['TextInfoMaterial']);
			// 	$infoTime1 = ($row['TextInfoTime']);
			// 	$imageTime1 = ($row['ImageInfoTime']);
			// 	$videoLink1 = ($row['VideoInfo']);
			// 	$imageGuider1 = ($row['ImageInfoGuider']);
			// 	$infoMaterial1_1 = ($row['ImageMaterial1']);
			// 	$infoMaterial1_2 = ($row['ImageMaterial2']);
			// 	$infoMaterial1_3 = ($row['ImageMaterial3']);

			// } else if ($i == 5) { // fifth row
			// 	$weekLessonTitle = ($row['UnitName']); 
	  //   		$yourGuide = ($row['UnitName']);
	  //   		$lectureName1 = ($row['LectureName']);
	  //   		$infoPurpose1 = ($row['TextInfoPurpose']);
	  //   		$action1_1 = ($row['TextInfoAction1']);
	  //   		$action1_2 = ($row['TextInfoAction2']);
	  //   		$action1_3 = ($row['TextInfoAction3']);
	  //   		$action1_4 = ($row['TextInfoAction4']);
	  //   		$material1 = ($row['TextInfoMaterial']);
			// 	$infoTime1 = ($row['TextInfoTime']);
			// 	$imageTime1 = ($row['ImageInfoTime']);
			// 	$videoLink1 = ($row['VideoInfo']);
			// 	$imageGuider1 = ($row['ImageInfoGuider']);
			// 	$infoMaterial1_1 = ($row['ImageMaterial1']);
			// 	$infoMaterial1_2 = ($row['ImageMaterial2']);
			// 	$infoMaterial1_3 = ($row['ImageMaterial3']);

	    	}
	    	$i++;
	    }
	}
?>