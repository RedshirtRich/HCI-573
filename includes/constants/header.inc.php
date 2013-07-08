<header>Sustainable Journey</header>

<script language="JavaScript" type="text/javascript" src="jquery-1.9.1.min.js"></script>
<!-- add link to jquery library -->
<script src="includes/js/jquery-1.9.1.min.js"></script>  

<script>
// $ (function() //function that gets called whenever the document is loaded
// {
// 	//what happens when mousing over the button?
// 	$ ("button").mouseenter(function() {
// 		$(this).css("background-color","#000000");
// 	});
	
// 	$ ("button").mouseleave(function() {
// 		$(this).css("background-color","#FFFFFF");
// 	});
	
// 	//Detect click on area
// 	$(".logOff").click(function() {
		
// 		// kill the session
// 		<?php 
// 			session_destroy(); 
// 			echo "I logged you off";
// 		?>
	
// 		//We return false to prevent page refresh or reload
// 		return false;
// 	});
// });
</script>

<?php 
	if ($_SESSION['userName'] != '') {
		echo "Welcome to Sustainable Journey, " . $_SESSION['userName'] . ". ";
		echo "<button type=\"submit\" class=\"logOff\" id=\"logOff_button\">Log Off</button>";
	} else {
		echo "You are not logged in.";
	}
?>
	