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
?>

<!-- ONE PAGE, TO RULE THEM ALL! -->

<div id="divWeekLessonContainer">

	<!-- INCLUDE our data call here BEFORE we start calling the data variables it will set up for us -->
	<!-- Each fresh call of this php gets passed our updated corresponding $pageWeekNumber, resulting in appropriate data -->
	<?php include "get_lessons.php"; ?>

	<!-- We are going to cheat up in here and format ourselves to the data we KNOW will be coming back, -->
	<!-- just for the sake of getting something done, and because our data needs to be better constructed -->
	<!-- in order to be more dynamic, as it should be for a site that is a SERVICE for displaying lessons -->
	<div id="divGuideBlock">
		<div id="divLessonTitle">
			<?php echo "<h3>" . $weekLessonTitle . "</h3>"; ?>
		</div>
		<?php $imageContent = "/images/" . $imageGuider1; ?>
		<div id="divGuidePane">
			<div id="divGuideImage">
				<center>
					<img src="<?php echo BASE; echo $imageContent; ?>" alt="<?php echo $altText; ?>" />
				</center>
			</div>	
			<?php echo "<h4>" . $yourGuide . "</h4>"; ?>
		</div>
		<div id="divGuideDialog">
			<?php echo $guideInfo; ?>
		</div>
	</div>
		
</div>