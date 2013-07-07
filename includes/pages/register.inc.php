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

// if (isset($_POST['#userName'])) { 
// 	$url = BASE . "/index.php";
// 	header("Location: $url");
// 	exit;
// } 
?>

<link href="<?php echo BASE; ?>/includes/styles/style.css" rel="stylesheet" type="text/css">
<h2>Register for Sustainable Journey</h2>
<p>Select a Kids or Teacher/Parent Portal during registration.</p>

<script language="JavaScript" type="text/javascript" src="jquery-1.9.1.min.js"></script>
<!-- add link to jquery library -->
<script src="includes/js/jquery-1.9.1.min.js"></script>  

<script>
$ (function() //function that gets called whenever the document is loaded
{
	//what happens when mousing over the button?
	$ ("button").mouseenter(function() {
		$(this).css("background-color","#269926");
	});
	
	$ ("button").mouseleave(function() {
		$(this).css("background-color","#008500");
	});
	
	//Detect click on REGISTER BUTTON area
	$(".register").click(function() {
		//Step 1: get the inputs that the user entered
		var userName = $("#userName").val();
		var userID = $("#userRegisterName").val();
		var userEmail = $("#userRegisterEmail").val();
		var pass1 = $("#userPassword").val();
		var pass2 = $("#userPassword2").val();
		var userType = $("#userType").val();

		//Step 2: check if all inputs are entered 
		if (userName == '' || userID == '' || userEmail == '' || pass1 == '' || pass2 == '') {
			
			$(".errorReg").fadeIn(400).show().html('<p id="errorReg" class=errorReg><b><span style="color:red;">Please complete all fields.</span></b></p>');
		}
		else if (pass1 != pass2) {
			$(".errorReg").fadeIn(400).show().html('<p id="errorReg" class=errorReg><b><span style="color:red;">Passwords do not match.  Please re-enter.</span></b></p>');
		}
		else if (userType == '99') {
			$(".errorReg").fadeIn(400).show().html('<p id="errorReg" class=errorReg><b><span style="color:red;">Please select your access type.</span></b></p>');
		}
		else {
			// var html_success = '<p id="successReg" class=successReg><b>Your registration was successfully submitted, ' + userName + '</b></p>';

			// Finally, this gets executed if ALL fields were entered
			var post_data_string = 'userName=' + userName + '&userRegisterName=' + userID + '&userRegisterEmail=' + userEmail + '&userPassword=' + pass1 + '&userType=' + userType;
			
			$.ajax({
				type: "POST",
				url:"process_registration.php?action=add",
				data: post_data_string,
				success: function(){
					// hide the error message
					$(".errorReg").fadeOut(2000).hide();
					
					// show success message
					$(".successReg").fadeIn(400).show().html('<p id="successReg" class=successReg><b>Your registration was successfully submitted, ' + userName + '</b></p>').fadeOut(5000);

					// clear out the registration page
					$("#userName").val(''); 
					$("#userRegisterName").val('');
					$("#userRegisterEmail").val('');
					$("#userPassword").val(''); 
					$("#userPassword2").val('');
					$("#userType").val('99');
					userName = '';
					userID = '';
					userEmail = '';
					pass1 = '';
					pass2 = '';
					userType = '';
				}
			
			});
			// do some session majics to preserve user login state

			// redirect, now that we are registered
			// If we redirect too soon, we lose our php post, so set a 2 second timer before redirect
			setTimeout('window.location.href = "http://localhost:8888/HCI7573-FinalProject/HCI%20573/index.php"', 2000);
		}
	
		//We return false to prevent page refresh or reload
		return false;
	});
});
</script>

<div id="divContainer">
	<div id="divRegister">
		<form id="form" name="form" method="post">  <!-- action="process_registration.php" -->
			
			<p id="loginHeader" class=loginHeader><span style="color:black;">Register Now</span></p>
			<br>
			<center>

				<table>
					<tr>
						<td align="left"> <label>Your first name:</label> </td>
						<td> <input type="text" name="userName" id="userName" MAXLENGTH="15" VALUE="" /> </td>
					</tr>	
					<tr>
						<td align="left"> <label>User Name:</label> </td>
						<td> <input type="text" name="userRegisterName" id="userRegisterName" MAXLENGTH="15" VALUE="" /> </td>
					</tr>
					<tr>
						<td align="left"> <label>Your email:</label> </td>
						<td> <input type="text" name="userRegisterEmail" id="userRegisterEmail" MAXLENGTH="50" VALUE="" /> </td>
					</tr>
					<tr>
						<td align="left"> <label>Password:</label> </td>
						<td> <input type="text" name="userPassword" id="userPassword" MAXLENGTH="12" VALUE=""/> </td>
					</tr>
					<tr>
						<td align="left"> <label>Re-enter Password:</label> </td>
						<td> <input type="text" name="userPassword2" id="userPassword2" MAXLENGTH="12" VALUE=""/> </td>
					</tr>
					<tr>
						<td align="left"> <label>Access Type:</label> </td>
						<td> 
							<select name="userType" id="userType">
								<option value="99" selected>Select access type:</option>
							  	<option value="2">Kids' Portal</option>
							  	<option value="1">Parent/Teacher Portal</option>
							</select>
						</td>
					</tr>
				</table>

				<button type="register" class="register" id="register_button">Register</button>
				<br>
				<br>
				<span class="successReg" id="successReg" style="display:none; color:black;"></span>
				<span class="errorReg" id="errorReg" style="display:none; color:red;"></span>
			</center>
			
		</form>
	</div>

	<div id="divLoginForm"> 
		<form id="form" name="form" method="post">  <!-- action="process_submission.php" -->
			
			<p id="loginHeader" class=loginHeader><span style="color:black;">Existing User</span></p>
			<br>
			<label>User Name:</label>
			<input type="text" name="name" id="name" />
			<br>
			<label>Password:</label>
			<input type="text" name="title" id="title" />
			<br>
			<br>

			<!-- input our hidden page values, $entryTime -->
			<input type="hidden" name="entryTime" id="entryTime" value=<?php $date = new DateTime(); echo $date->getTimestamp(); ?> />

			<button type="submit" class="submit" id="submit_button">Log In</button>
			<br>
			<br>
			<span class="success" id="success" style="display:none; color:red;"></span>
			<span class="error" id="error" style="display:none; color:red;"></span>
			
		</form>

	</div>
</div>