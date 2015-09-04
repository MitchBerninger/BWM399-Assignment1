<div class="showFree">
<div class="trackerHeader">
<div id="bannerText">
		<img src="_images/trackerBanner.png">
</div>
</div>
<div class="errorBox">
<div class="alertText">
<?php
//include the database connection
	include('dbconnect.php');
if(!isset($_SESSION['validUser'])){
	include('_includes/accessdenied.php');
	exit;
}
//check to if the connection was successful
	if(!$db OR !isset($_SESSION['validUser'])){
		echo "<h2> Sorry we cannot process your request at this time.<br>
		Please login to continue...</h2><br />";
		echo "<a href=\"index.php?content=login\">Login</a><br />";
		echo "<a href=\"index.php\">Home</a><br />";
		exit;
	}
?>
</div>
</div>
<div class="infoBox">
<div class="textBox">
    	<div id="title">
       		<h3><a href="index.php?content=showFree" class="miniButton trackerBack">Back</a></h3>
        	<h1>Modify Free Weight Log</h1>
        </div>
        <div class="clear"></div>
        <div class="textSegment">
<?php
	$workoutID = $_GET['id'];
	$tableFree = 'trackerFree';
		
	//Search for matching records
	$query = "SELECT * from $tableFree WHERE workoutID = '$workoutID';";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result);

	if($row == 0){
		echo "<h3>Sorry, your log book is empty.";
	}
	else{
		$workoutID = $row[0];
		$userID = $row[1];
		$muscleGroup = $row[2];
		$exerciseName = $row[3];
		$weight = $row[4];
		$sets = $row[5];
		$reps = $row[6];
			
		echo "<ul>";
		echo "<form name='updateFree' method='get' action='index.php'>";
		echo "<input type='hidden' name='workoutID' value='$workoutID' readonly='readonly'/>";
		echo "<li><label>Muscle Group: </label><input type='text' name='muscleGroup' value='$muscleGroup'/></li>";
		echo "<li><label>Exercise Name: </label><input type='text' name='exerciseName' value='$exerciseName'/></li>";
		echo "<li><label>Weight: </label><input type='text' name='weight' value='$weight'/></li>";
		echo "<li><label>Sets: </label><input type='text' name='sets' value='$sets'/></li>";
		echo "<li><label>Reps: </label><input type='text' name='reps' value='$reps'/></li>";
		echo "</ul>";

		
		echo "<input type='submit' value='Update' / class='miniButton'>";
		echo "<input type='hidden' name='content' value='updateFree'/ class='miniButton'>";
		
		echo "</form>";
	}

?>
</div>
</div>
</div>