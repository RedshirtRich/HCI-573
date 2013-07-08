<header>Sustainable Journey</header>

<script language="JavaScript" type="text/javascript" src="jquery-1.9.1.min.js"></script>
<!-- add link to jquery library -->
<script src="includes/js/jquery-1.9.1.min.js"></script>  

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
		// If we redirect too soon, we lose our php post, so set a 2 second timer before redirect
		setTimeout('window.location.href = "http://localhost:8888/HCI7573-FinalProject/HCI%20573/index.php"', 2000);
	});
});
</script>

<?php 
	if ($_SESSION['userName'] != '') {
		echo "Welcome to Sustainable Journey, " . $_SESSION['userName'] . ". ";
		echo "<button type=\"logOff\" class=\"logOff\" id=\"logOff_button\">Log Off</button>";
	} else {
		echo "You are not logged in.";
	}
?>
	