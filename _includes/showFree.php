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
            <h1>Free Weight Log</h1>
        </div>
        <div class="clear"></div>
        <div class="textSegment">
<?php
	$tableFree = 'trackerFree';
	$userID = $_SESSION['validUser'];

	
//Search for matching records
	$query = "SELECT * from $tableFree WHERE userID = '$userID';";
	$result = mysqli_query($db, $query);
	//$row = mysqli_fetch_row($result);
	
echo "<table border='1'>";
echo "<tr><th class='colEven'>Muscle Group</th><th class='colOdd'>Exercise Name</th><th class='colEven'>Weight</th><th class='colOdd'>Sets</th><th class='colEven'>Reps</th></tr>";
	if(mysqli_num_rows($result) == 0) {
		echo "<h1>Sorry, Your Log Book is Empty</h1>";
	}
	
	else{
		while($row=mysqli_fetch_array($result, MYSQL_ASSOC)){
echo "<tr>
		<td class='colEven'>$row[muscleGroup]</td>
		<td class='colOdd'>$row[exerciseName]</td>
		<td class='colEven'>$row[weight]</td>
		<td class='colOdd'>$row[sets]</td>
		<td class='colEven'>$row[reps]</td>
		<td><a href=\"index.php?content=modifyFree&id=$row[workoutID]\" class='miniButton'>Modify</a></td>
		<td><a href=\"index.php?content=deleteFree&id=$row[workoutID]\" class='miniButton'>Delete</a></td>


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