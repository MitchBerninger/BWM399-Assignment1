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
		echo "<h2> Sorry you can view this page.<br>
		Please login as an admin...</h2><br />";
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
	$userID = $_REQUEST['userID'];
	$email = $_REQUEST['email'];
	$firstName = $_REQUEST['firstName'];
	$lastName = $_REQUEST['lastName'];
	$phone = $_REQUEST['phone'];
	$address = $_REQUEST['address'];	
	$city = $_REQUEST['city'];
	$state = $_REQUEST['state'];
	$zipCode = $_REQUEST['zipCode'];
	$access = $_REQUEST['access'];

	
	$query = "UPDATE $tablename SET ";
	$query .= "email = '$email', ";
	$query .= "firstName = '$firstName', ";
	$query .= "lastName = '$lastName', ";
	$query .= "phone = '$phone', ";
	$query .= "address = '$address', ";
	$query .= "city = '$city', ";
	$query .= "state = '$state', ";
	$query .= "zipCode = '$zipCode', ";
	$query .= "access = '$access' ";
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
echo "<h2>The user account is now updated</h2>";
echo "<META HTTP-EQUIV='Refresh' Content = '1; URL=index.php?content=adminShow'>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>