<div class="adminShow">
<div class="adminHeader">
<div id="bannerText">
		<img src="_images/adminBanner.png">
</div>
</div>
<div class="errorBox">
<div class="alertText">
<?php
//include the database connection
	include('dbconnect.php');
if($_SESSION['access'] != 'A'){
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
            <h1>User Accounts</h1>
        </div>
        <div class="clear"></div>
        <div class="textSegment">
<?php
	$tablename = 'users';
	$userID = $_SESSION['validUser'];

	
//Search for matching records
	$query = "SELECT * from $tablename;";
	$result = mysqli_query($db, $query);
	//$row = mysqli_fetch_row($result);
	
echo "<table border='1'>";
echo "<tr><th class='colEven'>User ID</th><th class='colOdd'>First Name</th><th class='colEven'>Last Name</th><th class='colOdd'>Email</th></tr>";
	if(mysqli_num_rows($result) == 0) {
		echo "<h1>Sorry, There are no user accounts.</h1>";
	}
	
	else{
		while($row=mysqli_fetch_array($result, MYSQL_ASSOC)){
echo "<tr>
		<td class='colEven'>$row[userID]</td>
		<td class='colOdd'>$row[firstName]</td>
		<td class='colEven'>$row[lastName]</td>
		<td class='colOdd'>$row[email]</td>
		<td><a href=\"index.php?content=adminModify&id=$row[userID]\" class='miniButton'>Modify</a></td>
		<td><a href=\"index.php?content=adminDelete&id=$row[userID]\" class='miniButton'>Delete</a></td>


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