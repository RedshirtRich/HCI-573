<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include 'includes/constants/sql_constants.php';
include 'includes/constants/dbc.php';

if ($_POST) //check if POST data exists 
{
	if ($_GET['action'] == "add") //did someone pass a variable called action with a value add
	{

		$name =  mysql_real_escape_string($_POST['name']);
		$title = mysql_real_escape_string($_POST['title']);
		$blog = mysql_real_escape_string($_POST['blog']);
		
		
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
		$sql  = "SELECT * FROM $table_name";
		$result = mysql_query($sql,$con);
		if ($result) {
			// echo "we have that table";
		} else {
			//an SQL query for creating a table
			//The table has four fields: PID, Name, Title, and Blog
			//The query specifies the types of the fields 
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
					PID INT NOT NULL AUTO_INCREMENT,
					Name CHAR(30),
					Title CHAR(100),
					Blog CHAR(255),
					EntryTime varchar(30),
					
					PRIMARY KEY(PID)
			)";

			// Execute query to create table
			$create = mysql_query($sql,$con);
		}

		$sql = "INSERT INTO $table_name (Name, Title, Blog, EntryTime) VALUES ('$name', '$title', '$blog' , now())";
		
		// execute the insert query
		$result = mysql_query($sql,$con) or die(mysql_error());

	   //Data added, we exit the script
	   exit();
	}
}
	
?>