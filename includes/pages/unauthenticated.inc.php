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
<link href="<?php echo BASE; ?>/includes/styles/style.css" rel="stylesheet" type="text/css">
<h2>Log In</h2>
<p>Welcome.  You can Log In or Register here.</p>

<script language="JavaScript" type="text/javascript" src="jquery-1.9.1.min.js"></script>
<!-- add link to jquery library -->
<script src="includes/js/jquery-1.9.1.min.js"></script>  

<script>
$ (function() //function that gets called whenever the document is loaded
{
	//what happens when mousing over the button?
	$ ("button").mouseenter(function() {
		$(this).css("background-color","#7f1d18");
	});
	
	$ ("button").mouseleave(function() {
		$(this).css("background-color","#FF3B30");
	});
	
	//Detect click on area
	$(".submit").click(function() {
		//Step 1: get the inputs that the user entered
		var entered_name = $("#name").val();
		var entered_title = $("#title").val();
		var entered_blog = $("#blog").val();

		//Step 2: check if all inputs are entered 
		if (entered_name == '' || entered_title == '' || entered_blog == '') {
			
			$(".error").fadeIn(400).show().html('<p id="error" class=error><b><span style="color:red;">Please complete all fields.</span></b></p>');
		}
		else {
			var html_success = '<p id="success" class=success><b>Your blog was successfully posted, ' + entered_name + '</b></p>';
		
			//this gets executed if all fields were entered
			var post_data_string = 'name=' + entered_name + '&title=' + entered_title + '&blog=' + entered_blog;
			
			//e.g., "name=Bosephus&title=MyBlog&blog=WhyILikeBlogging
			
			$.ajax({
				type: "POST",
				url:"process_submission.php?action=add",
				data: post_data_string,
				success: function(){
					$("#name").val(''); //clear name
					$("#title").val(''); //clear title
					$("#blog").val(''); // clear blog
					
					//hide the error message
					$(".error").fadeOut(2000).hide();
					
					//show success message
					$(".success").fadeIn(1000).show().html(html_success).fadeOut(500);
				}
			
			});
			
		}
	
		//We return false to prevent page refresh or reload
		return false;
	});
});
</script>

<div id="nameEntryForm"> 
	<form id="form" name="form" method="post">  <!-- action="process_submission.php" -->
		
		<br>
		<br>
		<label>User Name:</label>
		<input type="text" name="name" id="name" />
		<br>

		<br>
		<label>Password:</label>
		<input type="text" name="title" id="title" />
		<br>

		<!-- input our hidden page values, $entryTime -->
		<input type="hidden" name="entryTime" id="entryTime" value=<?php $date = new DateTime(); echo $date->getTimestamp(); ?> />

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<button type="submit" class="submit" id="submit_button">Log In</button>
		<br>
		<br>
		<span class="success" id="success" style="display:none; color:red;"></span>
		<span class="error" id="error" style="display:none; color:red;"></span>

		
	</form>

</div>