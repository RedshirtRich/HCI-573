<?php

// turning on PHP error debugging console
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include 'includes/constants/sql_constants.php';
include 'includes/constants/dbc.php';

session_start();

if (!isset($_SESSION['userName'])) {
	$_SESSION['userName'] = '';
	$_SESSION['userID'] = '';
	$_SESSION['userType'] = '';
	$_SESSION['memberSince'] = '';
	$_SESSION['pointsEarned'] = '';
}

if ($_POST) //check if POST data exists 
{
	if ($_GET['action'] == "login") //did someone pass a variable called action with a value login
	{

		$name =  mysql_real_escape_string($_POST['name']);
		$passy = mysql_real_escape_string($_POST['passy']);
		
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
				UserType INT NOT NULL,
				UserPoints INT DEFAULT 0,
				UserHeaderPath CHAR(100),
				UserNote CHAR(100),
				EntryTime varchar(30),
				
				PRIMARY KEY(UserID, UserRegisterName)
			)";

			// Execute query to create table
			$create = mysql_query($sql,$con);

			// ---------------------------------------------- //
			// PROTOTYPE TEST CODE
			// Run another query to insert our default users
			$sql = "INSERT INTO 
				$login_table_name (UserName, UserRegisterName, UserPassword, UserRegisterEmail, UserType, UserPoints, EntryTime) 
				VALUES 
				('mengduo', 'hci573_mengduo', 'hci573', 'marinama@iastate.edu', 1, 0, '2013-06-30 12:00:00'), 
				('rich', 'hci573_rich', 'hci573', 'rwtanner@iastate.edu', 1, 0, '2013-06-30 12:00:00'),
				('michelle', 'hci573_michelle', 'hci573', 'mblomber@iastate.edu', 1, 0, '2013-06-30 12:00:00'),
				('hci573', 'hci573', 'hci573', 'hci573@iastate.edu', 1, 0, '2013-06-30 12:00:00'),
				('test', 'text_user', 'hci573', 'test@test.test', 2, 10, '2013-06-31 12:00:00')"; // kids get 10 points just for registering
		
			// execute the insert query
			$insertDefaults = mysql_query($sql,$con) or die(mysql_error());
			// ---------------------------------------------- //
		}

		// THIS is what we are here for.  Grab this user.
		$sql = "SELECT * FROM  $login_table_name  WHERE UserRegisterName = '$name' AND UserPassword = '$passy'";

		// execute the insert query
		$finduser = mysql_query($sql, $con);

		// if we got our expected ONE result back...
		if (mysql_num_rows($finduser) == 1) {
			// get the row...
	    	$row = mysql_fetch_array($finduser);
	    
		    // set up our session variables based on the new logon
			$_SESSION['userName'] = $row['UserName'];
			$_SESSION['userID'] = $row['UserRegisterName'];
			$_SESSION['userType'] = $row['UserType'];
			$_SESSION['memberSince'] = $row['EntryTime'];
			$_SESSION['pointsEarned'] = $row['UserPoints'];
		} 

	   //Data added, we exit the script
	   exit();
	}

} 

?>