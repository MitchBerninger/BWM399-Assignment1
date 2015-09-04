<div class="showMachine">
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
       		<h3><a href="index.php?content=showMachine" class="miniButton trackerBack">Back</a></h3>
        	<h1>Modify Weight Machine Log</h1>
        </div>
        <div class="clear"></div>
        <div class="textSegment">
<?php
	$workoutID = $_GET['id'];
	$tableMachine = 'trackerMachine';
		
	//Search for matching records
	$query = "SELECT * from $tableMachine WHERE workoutID = '$workoutID';";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result);

	if($row == 0){
		echo "<h3>Sorry, your log book is empty.";
	}
	else{
		$workoutID = $row[0];
		$userID = $row[1];
		$MmuscleGroup = $row[2];
		$machineName = $row[3];
		$Mweight = $row[4];
		$Msets = $row[5];
		$Mreps = $row[6];
			
		echo "<ul>";
		echo "<form name='updateFree' method='get' action='index.php'>";
		echo "<input type='hidden' name='workoutID' value='$workoutID' readonly='readonly'/>";
		echo "<li><label>Muscle Group: </label><input type='text' name='MmuscleGroup' value='$MmuscleGroup'/></li>";
		echo "<li><label>Machine Name: </label><input type='text' name='machineName' value='$machineName'/></li>";
		echo "<li><label>Weight: </label><input type='text' name='Mweight' value='$Mweight'/></li>";
		echo "<li><label>Sets: </label><input type='text' name='Msets' value='$Msets'/></li>";
		echo "<li><label>Reps: </label><input type='text' name='Mreps' value='$Mreps'/></li>";
		echo "</ul>";

		
		echo "<input type='submit' value='Update' / class='miniButton'>";
		echo "<input type='hidden' name='content' value='updateMachine'/ class='miniButton'>";
		
		echo "</form>";
	}

?>
</div>
</div>
</div>