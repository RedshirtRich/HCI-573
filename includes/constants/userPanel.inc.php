<div id="divLoginForm"> 
		
	<p id="loginHeader" class=loginHeader><span style="color:black;">Profile</span></p>
	<br>
	<label><?php echo "Welcome back, " . $_SESSION['userName']; ?></label>
	<br>
	<?php 
		if ($_SESSION['userType'] == 1) {
			$portal = "Parent/Teacher Portal";
		} else {
			$portal = "Kids Portal";
		}
	?>
	<label><?php echo "Membership Type: <br>" . $portal; ?></label>
	<br>
	<label><?php echo "Member since: <br>" . date('F d, Y', strtotime($_SESSION['memberSince'])); ?></label>
	<br>
	<?php 
		if ($_SESSION['userType'] == 2) {
			echo "<label>Points Earned: <br>" . $_SESSION['pointsEarned'] . "</label>";
		}
	?>
		
</div>