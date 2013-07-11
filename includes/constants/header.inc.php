<script language="JavaScript" type="text/javascript" src="jquery-1.9.1.min.js"></script>
<!-- add link to jquery library -->
<script src="includes/js/jquery-1.9.1.min.js"></script>  

<div id="divHeaderPanel">
	<header>Sustainable Journey</header>
	<script>
	$ (function() //function that gets called whenever the document is loaded
	{
		//what happens when mousing over the button?
		// $ ("#logOff_button").mouseenter(function() {
		// 	$(this).css("background-color","#000000");
		// });
		
		// $ ("#logOff_button").mouseleave(function() {
		// 	$(this).css("background-color","#FFFFFF");
		// });
		
		//Detect click on area
		$("#logOff_button").click(function() {
			// call majic php to clear our logon session
			$.get("clearsession.php");

			// redirect, now that we are logged off
			// If we redirect too soon, we lose our php post, so set a 1 second timer before redirect
			setTimeout('window.location.href = "<?php echo BASE; ?>/index.php"', 1000);
		});
	});
	</script>

	<?php 
		if ($_SESSION['userName'] != '') {
			echo "<table class=\"width100\">";
				echo "<col class=\"width33\" />";
				echo "<col class=\"width33\" />";
				echo "<col class=\"width33\" />";
				echo "<tr>";
					echo "<td>";
						echo "<div id=\"headerSubtext\">Welcome back, " . $_SESSION['userName'] . ".</div>";
					echo "</td>";
					echo "<td align=\"center\">";
						echo "<div id=\"divHeaderNav\">";
						include "includes/constants/footerNav.inc.php";
						echo "</div>";
					echo "</td>";
					echo "<td>";
						echo "<button type=\"logOff\" class=\"logOff\" id=\"logOff_button\">Log Off</button>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
		} else {
			echo "<table class=\"width100\">";
				echo "<col class=\"width33\" />";
				echo "<col class=\"width33\" />";
				echo "<col class=\"width33\" />";
				echo "<tr>";
					echo "<td>";
						echo "<div id=\"headerSubtext\">You are not logged in.</div>";
					echo "</td>";
					echo "<td align=\"center\">";
						echo "<div id=\"divHeaderNav\">";
						include "includes/constants/footerNav.inc.php";
						echo "</div>";
					echo "</td>";
					echo "<td>";
						echo "  ";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
		}
	?>
</div>
	