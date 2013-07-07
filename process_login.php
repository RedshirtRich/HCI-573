<?php

include 'includes/constants/sql_constants.php';
include 'includes/constants/dbc.php';

if ($_POST) //check if POST data exists 
{
	if ($_GET['action'] == "login") //did someone pass a variable called action with a value login
	{

		$name =  mysql_real_escape_string($_POST['name']);
		$passy = mysql_real_escape_string($_POST['password']);
		
		
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
		$sql  = "SELECT * FROM $login_table_name";
		$result = mysql_query($sql,$con);
		if ($result) {
			// echo "we have that table";
		} else {
			//an SQL query for creating our table
			$sql = "CREATE TABLE IF NOT EXISTS $login_table_name (
				ProgramID INT DEFAULT 1,
				UserID INT NOT NULL AUTO_INCREMENT,
				UserName CHAR(15) NOT NULL,
				UserRegisterName CHAR(15) NOT NULL,
				UserPassword CHAR(12) NOT NULL,
				UserRegisterEmail CHAR(50) NOT NULL,
				UserType INT,
				UserHeaderPath CHAR(100),
				UserNote CHAR(100),
				EntryTime varchar(30),
				
				PRIMARY KEY(UserID)
			)";

			// Execute query to create table
			$create = mysql_query($sql,$con);

			// ---------------------------------------------- //
			// PROTOTYPE TEST CODE
			// Run another query to insert our default users
			$sql = "INSERT INTO 
				$login_table_name (UserName, UserRegisterName, UserPassword, UserRegisterEmail, UserType, EntryTime) 
				VALUES 
				('mengduo', 'hci573_mengduo', 'hci573', 'marinama@iastate.edu', 1, now()), 
				('rich', 'hci573_rich', 'hci573', 'rwtanner@iastate.edu', 1, now()),
				('michelle', 'hci573_michelle', 'hci573', 'mblomber@iastate.edu', 1, now()),
				('hci573', 'hci573', 'hci573', 'hci573@iastate.edu', 1, now()),
				('test', 'text_user', 'hci573', 'test@test.test', 2, now())";
		
			// execute the insert query
			$insertDefaults = mysql_query($sql,$con) or die(mysql_error());
			// ---------------------------------------------- //
		}

		// THIS is what we are here for.  Grab this user.
		$sql = "SELECT * FROM  $login_table_name  WHERE UserRegisterName = $name AND UserPassword = $passy";
		
		// execute the insert query
		$result = mysql_query($sql,$con) or die("Invalid query: " . mysql_error());

	   //Data added, we exit the script
	   exit();
	}
}
	
?>