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