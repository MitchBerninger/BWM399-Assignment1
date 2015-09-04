<div class="showCardio">
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
       		<h3><a href="index.php?content=showCardio" class="miniButton trackerBack">Back</a></h3>
        	<h1>Modify Cardio Log</h1>
        </div>
        <div class="clear"></div>
        <div class="textSegment">
<?php
	$workoutID = $_GET['id'];
	$tableCardio = 'trackerCardio';
		
	//Search for matching records
	$query = "SELECT * from $tableCardio WHERE workoutID = '$workoutID';";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result);

	if($row == 0){
		echo "<h3>Sorry, your log book is empty.";
	}
	else{
		$workoutID = $row[0];
		$userID = $row[1];
		$cardioType = $row[2];
		$length = $row[3];
		$distance = $row[4];
		$location = $row[5];
		$heartRate = $row[6];
			
		echo "<ul>";
		echo "<form name='updateCardio' method='get' action='index.php'>";
		echo "<input type='hidden' name='workoutID' value='$workoutID' readonly='readonly'/>";
		echo "<li><label>Cardio Exercise: </label><select name='cardioType' value='$cardioType'>
            	<option value='Run'>Run</option>
                <option value='Walk'>Walk</option>
                <option value='Bike'>Bike</option>
                <option value='Zumba'>Zumba</option>
            </select></li>";
		echo "<li><label>Duration: </label><input type='text' name='length' value='$length'/></li>";
		echo "<li><label>Distance: </label><input type='text' name='distance' value='$distance'/></li>";
		echo "<li><label>Location: </label><input type='text' name='location' value='$location'/></li>";
		echo "<li><label>Heart Rate: </label><input type='text' name='heartRate' value='$heartRate'/></li>";
		echo "</ul>";

		
		echo "<input type='submit' value='Update' / class='miniButton'>";
		echo "<input type='hidden' name='content' value='updateCardio'/ class='miniButton'>";
		
		echo "</form>";
	}

?>
</div>
</div>
</div>