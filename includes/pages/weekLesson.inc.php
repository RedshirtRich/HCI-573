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
	<div id="divGuidePanel">
		<div id="divLessonTitle">
			<?php echo "<h3>" . $weekLessonTitle . "</h3>"; ?>
		</div>
		<?php $imageContent = "/images/" . $imageGuider1; ?>
		<div id="divGuideImageFrame">
			<div id="divGuideImage">
				<center>
					<img src="<?php echo BASE; echo $imageContent; ?>" alt="<?php echo $yourGuide; ?>" />
				</center>
			</div>	
			<?php echo "<h4>" . $yourGuide . "</h4>"; ?>
		</div>
		<div id="divGuideDialog">
			<?php echo $guideInfo; ?>
		</div>
	</div>
	<br>
	<br>
	<br>
	<div id="divGuideVideoPanel">
		<table>
			<tr>
				<td>
					<div id="divGuideVideoFrame">
						<iframe title="YouTube video player" class="youtube-player" type="text/html" width="450" height="253" src="<?php echo $videoLink; ?>" frameborder="0" allowFullScreen></iframe>
					</div>
				</td>
				<td>	
					<h4>Check out an interesting video about me!</h4> 
				</td>
			</tr>
		</table>		
	</div>

	<div id="divLessonPanel">
	<!-- Use a php loop to go through the rest of out data -->
	<?php
		// since we know the number of rows in each lesson, we are CHEATING here and setting them manually
		if ($pageWeekNumber == 1) {
			$rowCount = 11;
		} else if ($pageWeekNumber == 2 || $pageWeekNumber == 3 || $pageWeekNumber == 4) {
			$rowCount = 10;
		} else if ($pageWeekNumber == 5) {
			$rowCount = 5;
		}
		for ($i = 1; $i <= $rowCount; $i++) {
			echo "<hr>";
			echo "<center>";
			echo "<div id=\"divLessonSubTitle\">";
				echo "<div id=\"divh5\">" . ${"lectureName" . $i} . "</div>";
			echo "</div>";


			echo "<div id=\"divLessonSubTitle\"><div id=\"divh6\">Step 1: Why Act?</div></div>";
			echo "<div id=\"divInfoPurpose\">";
				echo ${"infoPurpose" . $i};
			echo "</div>";
			echo "<br>";
			echo "<br>";


			echo "<div id=\"divLessonSubTitle\"><div id=\"divh6\">Step 2: Earth Act</div></div>";
			echo "<div id=\"divActionsPanel\">";
				echo "<table class=\"width90\">";
				// up to four actions possible
				for ($j = 1; $j <= 4; $j++) {
					// check to see if each variable has been set, or is "null"
					if (${"action" . $j . "_" . $i} != "null") { 
						echo "<tr>";
							echo "<td width=\"10%\">";
								echo "<div id=\"divBulletShape\"></div>";
							echo "</td>";
							echo "<td>";
								echo "<div id=\"divActionCell\">";
									echo ${"action" . $j . "_" . $i};
								echo "</div>";
							echo "</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
			echo "</div>";
			echo "<br>";
			echo "<br>";



			echo "<div id=\"divLessonSubTitle\"><div id=\"divh6\">Step 3: Time</div></div>";
			echo "<table class=\"width50\">";
				echo "<tr>";
					echo "<td width=\"80px\">";
						echo "<img src=\"" . BASE . "/images/" . ${"imageTime" . $i} . "\" alt=\"timeimage\" />";
					echo "</td>";
					echo "<td width=\"200px\">";
						echo "<div id=\"divActionCell\">";
							echo ${"infoTime" . $i};
						echo "</div>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			echo "<br>";
			echo "<br>";


			echo "<div id=\"divLessonSubTitle\"><div id=\"divh6\">Step 4: Materials</div></div>";
			echo ${"material" . $i};
			echo "<table class=\"width90\">";
				echo "<tr>";
				if (${"infoMaterial1_" . $i} != "null") {
					echo "<td width=\"80px\">";
						echo "<center><img src=\"" . BASE . "/images/" . ${"infoMaterial1_" . $i} . "\" alt=\"timeimage\" /></center>";
					echo "</td>";
				}
				if (${"infoMaterial2_" . $i} != "null") {
					echo "<td width=\"80px\">";
						echo "<center><img src=\"" . BASE . "/images/" . ${"infoMaterial2_" . $i} . "\" alt=\"timeimage\" /></center>";
					echo "</td>";
				}
				if (${"infoMaterial3_" . $i} != "null") {
					echo "<td width=\"80px\">";
						echo "<center><img src=\"" . BASE . "/images/" . ${"infoMaterial3_" . $i} . "\" alt=\"timeimage\" /></center>";
					echo "</td>";
				}
				echo "</tr>";
			echo "</table>";
			echo "<br>";
			echo "<br>";


			echo "</center>";
		} 

	?>
	</div>
</div>





