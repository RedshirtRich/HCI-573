<?php

$url_self = $_SERVER['PHP_SELF'];

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
<link href="<?php echo BASE; ?>/includes/styles/style.css" rel="stylesheet" type="text/css">
<h2>Welcome</h2>
<p>You can Log In or Register here.</p>

<script language="JavaScript" type="text/javascript" src="jquery-1.9.1.min.js"></script>
<!-- add link to jquery library -->
<script src="includes/js/jquery-1.9.1.min.js"></script>  

<script>
$ (function() //function that gets called whenever the document is loaded
{
	//what happens when mousing over the button?
	$ ("#submit_button").mouseenter(function() {
		$(this).css("background-color","#269926");
	});
	
	$ ("#submit_button").mouseleave(function() {
		$(this).css("background-color","#008500");
	});
	
	//Detect click on area
	$(".submit").click(function() {
		//Step 1: get the inputs that the user entered
		var entered_name = $("#name").val();
		var entered_password = $("#password").val();

		//Step 2: check if all inputs are entered 
		if (entered_name == '' || entered_password == '') {
			
			$(".error").fadeIn(400).show().html('<p id="error" class=error><b><span style="color:red;">Please complete all fields.</span></b></p>');
		}
		else {
			var html_success = '<p id="success" class=success><b>Processing Logon...</b></p>';
		
			//this gets executed if all fields were entered
			var post_data_string = 'name=' + entered_name + '&passy=' + entered_password;
			
			
			$.ajax({
				type: "POST",
				url:"process_login.php?action=login",
				data: post_data_string,
				success: function(){
					$("#name").val(''); //clear name
					$("#password").val(''); //clear password
					
					//hide the error message
					$(".error").fadeOut(2000).hide();
					
					//show success message
					$(".success").fadeIn(1000).show().html(html_success).fadeOut(500);
				}
			
			});
			
		}
		// redirect, now that we are registered
		// If we redirect too soon, we lose our php post, so set a 1 second timer before redirect
		setTimeout('window.location.href = "http://localhost:8888/HCI7573-FinalProject/HCI%20573/index.php"', 1000);
	
		//We return false to prevent page refresh or reload
		return false;
	});
});
</script>

<div id="divContainer">
	<div id="divWelcomeContentPane">
		<p id="loginHeader" class=loginHeader><span style="color:black;">Find Interesting Topics</span></p>
	</div>

	<div id="divLoginForm"> 
		<form id="form" name="form" method="post">  <!-- action="process_submission.php" -->
			
			<p id="loginHeader" class=loginHeader><span style="color:black;">Log In</span></p>
			<br>
			<label>User Name:</label>
			<input type="text" name="name" id="name" />
			<br>
			<label>Password:</label>
			<input type="text" name="password" id="password" />
			<br>
			<br>

			<button type="submit" class="submit" id="submit_button">Log In</button>
			<span class="success" id="success" style="display:none; color:red;"></span>
			<span class="error" id="error" style="display:none; color:red;"></span>
			<label>Not a site member?</label>
			<br>
			<br>
			<br>
			<?php echo "<p id=\"registerLink\" class=registerLink><a href=\"".$url_self . "?p=register\">Register Here !</a></p>"; ?>
			
		</form>

	</div>
</div>