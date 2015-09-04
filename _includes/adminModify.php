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
       		<h3><a href="index.php?content=adminShow" class="miniButton trackerBack">Back</a></h3>
        	<h1>Modify User Accounts</h1>
        </div>
        <div class="clear"></div>
        <div class="textSegment">
<?php
	$userID = $_GET['id'];
	$tablename = 'users';
		
	//Search for matching records
	$query = "SELECT * from $tablename WHERE userID = '$userID';";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result);

	if($row == 0){
		echo "<h3>Sorry, no user information.";
	}
	else{
		$userID = $row[0];
		$email = $row[1];
		$firstName = $row[4];
		$lastName = $row[5];
		$phone = $row[6];
		$address = $row[7];
		$city = $row[8];
		$state = $row[9];
		$zipCode = $row[10];
		$access = $row[11];
			
		echo "<ul>";
		echo "<form name='adminUpdate' method='get' action='index.php'>";
		echo "<input type='hidden' name='userID' value='$userID' readonly='readonly'/>";
		echo "<li><label>Email: </label><input type='text' name='email' value='$email'/></li>";
		echo "<li><label>First Name: </label><input type='text' name='firstName' value='$firstName'/></li>";
		echo "<li><label>Last Name: </label><input type='text' name='lastName' value='$lastName'/></li>";
		echo "<li><label>Phone: </label><input type='text' name='phone' value='$phone'/></li>";
		echo "<li><label>Address: </label><input type='text' name='address' value='$address'/></li>";
		echo "<li><label>City: </label><input type='text' name='city' value='$city'/></li>";
		echo "<li><label>State: </label><input type='text' name='state' value='$state' maxlength='2'/></li>";
		echo "<li><label>Zip Code: </label><input type='text' name='zipCode' value='$zipCode'/></li>";
		echo "<li><label>User Access: </label><input type='text' name='access' value='$access' size='1' maxlength='1'/></li>";
		//echo"<li><label>User Access: </label><select name='access' value='$access'>
        //   	<option value='U'>User</option>
        //        <option value='A'>Admin</option>
        //    </select></li>";
		echo "</ul>";

		
		echo "<input type='submit' value='Update' / class='miniButton'>";
		echo "<input type='hidden' name='content' value='adminUpdate'/ class='miniButton'>";
		
		echo "</form>";
	}

?>
</div>
</div>
</div>