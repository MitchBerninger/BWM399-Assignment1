<?php
//include the database connection
	include('dbconnect.php');
if($_SESSION['access'] != 'A'){
	include('_includes/accessdenied.php');
	exit;
}
//check to if the connection was successful
	if(!$db OR !isset($_SESSION['validUser'])){
echo <<<EOB
<div class="adminShow">
<div class="adminHeader">
<div id="bannerText">
		<img src="_images/adminBanner.png">
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

	$tablename = 'users';
	$userID = $_GET['id'];	
	
	$query = "DELETE FROM $tablename ";
	$query .= "WHERE userID = '$userID';";
	
	//echo "$query";
	$result = mysqli_query($db, $query);
echo <<<EOB
<div class="adminShow">
<div class="adminHeader">
<div id="bannerText">
		<img src="_images/adminBanner.png">
</div>
</div>
<div class='errorBox'>
<div class='alertText'>
<div class='alertBox'>
<div id='title'>
EOB;
	echo "<h2>You have deleted the entry</h2>";
	echo "<META HTTP-EQUIV='Refresh' Content = '1; URL=index.php?content=adminShow'>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>