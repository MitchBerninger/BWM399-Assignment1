<div class="logHeader">
<div id="headerDark">
<div id="bannerText">
		<img src="_images/logBanner.png">
	</div>
</div>
</div>
<div id="home">
<div class="errorBox">
<div class="alertText">
<?php
//include the database connection
	include('dbconnect.php');

//check to see if the connection was successful
if(!$db){
		echo "<div class='alertBox'>";
		echo"<div id='title'>";
		echo "<h2> Sorry we cannot process your request at this time.
		Please try again later...</h2><br />";
		echo "<a href=\"index.php?content=register\"><h3>Try again</h3></a><br />";
		echo "<a href=\"index.php\"><h3>Home</h3></a><br />";
		echo "</div>";
		echo "</div>";
		exit;
	}

//check for form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//minimal form validation
	if(isset($_POST['email'], $_POST['password'])){

	//check if userid & password is in the database
		$userID = trim($_POST['userID']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$tablename = 'users';
		
		$query = "SELECT userID, email, password, firstName, lastName, access from $tablename WHERE email = '$email' AND password = SHA1('$password');";	
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_row($result);
		if(!$row){
			echo "<div class='alertBox'>";
			echo"<div id='title'>";
			echo "<h2>Sorry, there is an issue with your account.</h2>";
			echo "<a href=\"index.php?content=login\"><h3>Try again</h3></a>";
			echo "</div>";
			echo "</div>";
			}
		else{
			//Create a session variable
			$_SESSION['validUser'] = $row[0];
			$_SESSION['fullname'] = $row[3]." ".$row[4];
			$_SESSION['access'] = $row[5];
				echo "<div class='alertBox'>";
				echo"<div id='title'>";
				echo "<h1>Logging in...</h1>";
				echo "<META HTTP-EQUIV='Refresh' Content = '1; URL=index.php'>";
				echo "</div>";
				echo "</div>";
		}

	}//end if minimal form validation
}//end if check for form submission
?>
</div>
</div>
<div id="home">
<div class="infoBox">
	<div class="textBox">
    	<div id="title">
			<h1>Welcome Back!</h1>
            <h2>UNIFIT Member Access.</h2>
        </div>
    <div id="bottomInfoBox">
<div id="formBox">
<form action="index.php" novalidate method="post" target="_self">
	<ul>
    	<li><label>Email:</label><input type="text" name="email" required="required" /></li>
		<li><label>Password:</label><input type="password" name="password" required="required" /></li>
    </ul>

<input type="submit" class="miniButton" value="Submit" />
<input type="reset" class="miniButton" value="Reset" />
<input type="hidden" name="content" value="login" />
</form>
</div>
</div>
</div>
</div>
</div>
</div>