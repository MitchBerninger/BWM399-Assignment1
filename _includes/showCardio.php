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
		Please try again.</h2><br />";
		echo "<a href=\"index.php?content=fittracker\">Try again</a><br />";
		echo "<a href=\"index.php\">Home</a><br />";
		exit;
	}
?>
</div>
</div>
<div class="infoBox">
<div class="textBox">
    	<div id="title">
            <h3><a href="index.php?content=fittracker" class="miniButton trackerBack">Back</a></h3>
            <h1>Cardio Log</h1>
        </div>
        <div class="clear"></div>
        <div class="textSegment">
<?php
	$tableCardio = 'trackerCardio';
	$userID = $_SESSION['validUser'];

	
//Search for matching records
	$query = "SELECT * from $tableCardio WHERE userID = '$userID';";
	$result = mysqli_query($db, $query);
	//$row = mysqli_fetch_row($result);
	
echo "<table border='1'>";
echo "<tr><th class='colEven'>Cardio Exercise</th><th class='colOdd'>Duration</th><th class='colEven'>Distance</th><th class='colOdd'>Location</th><th class='colEven'>Heart Rate</th></tr>";
	if(mysqli_num_rows($result) == 0) {
		echo "<h1>Sorry, Your Log Book is Empty</h1>";
	}
	
	else{
		while($row=mysqli_fetch_array($result, MYSQL_ASSOC)){
echo "<tr>
		<td class='colEven'>$row[cardioType]</td>
		<td class='colOdd'>$row[length]</td>
		<td class='colEven'>$row[distance]</td>
		<td class='colOdd'>$row[location]</td>
		<td class='colEven'>$row[heartRate]</td>
		<td><a href=\"index.php?content=modifyCardio&id=$row[workoutID]\" class='miniButton'>Modify</a></td>
		<td><a href=\"index.php?content=deleteCardio&id=$row[workoutID]\" class='miniButton'>Delete</a></td>


	</tr>";
		}
		$row = mysqli_fetch_row($result);
	}
echo "</table>";

mysqli_close($db);
?>
</div>
</div>
</div>