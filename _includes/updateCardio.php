<?php
//include the database connection
	include('dbconnect.php');
if(!isset($_SESSION['validUser'])){
	include('_includes/accessdenied.php');
	exit;
}
//check to if the connection was successful
	if(!$db OR !isset($_SESSION['validUser'])){
echo <<<EOB
<div class="showCardio">
<div class="trackerHeader">
<div id="bannerText">
		<img src="_images/trackerBanner.png">
</div>
</div>
<div class='errorBox'>
<div class='alertText'>
<div class='alertBox'>
<div id='title'>
EOB;
		echo "<h2> Sorry you can not edit this log.<br>
		Please login...</h2><br />";
		echo "<a href=\"index.php?content=login\"><h3>Login</h3></a>";
		echo "<a href=\"index.php\"><h3>Home</h3></a><br />";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
		exit;
	}

	$tableCardio = 'trackerCardio';
	$workoutID = $_REQUEST['workoutID'];
	$cardioType = $_REQUEST['cardioType'];
	$length = $_REQUEST['length'];
	$distance = $_REQUEST['distance'];
	$location = $_REQUEST['location'];
	$heartRate = $_REQUEST['heartRate'];
	
	$query = "UPDATE $tableCardio SET ";
	$query .= "cardioType = '$cardioType', ";
	$query .= "length = '$length', ";
	$query .= "distance = '$distance', ";
	$query .= "location = '$location', ";
	$query .= "heartRate = '$heartRate' ";
	$query .= "WHERE workoutID = '$workoutID';";
	
	//echo "$query";
	$result = mysqli_query($db, $query);
echo <<<EOB
<div class="showCardio">
<div class="trackerHeader">
<div id="bannerText">
		<img src="_images/trackerBanner.png">
</div>
</div>
<div class='errorBox'>
<div class='alertText'>
<div class='alertBox'>
<div id='title'>
EOB;
echo "<h2>Your Log Book is now updated</h2>";
echo "<META HTTP-EQUIV='Refresh' Content = '1; URL=index.php?content=showCardio'>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>