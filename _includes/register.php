<div class="regHeader">
<div id="bannerText">
		<img src="_images/regBanner.png">
</div>
</div>
<div id="home">
<div class="errorBox">
<div class="alertText">
<?php
//include the database connection
	include('dbconnect.php');

//check to if the connection was successful
	if(!$db){
		echo "<div class='alertBox'>";
		echo"<div id='title'>";
		echo "<h2> Sorry we cannot process your request at this time.
		Please try again later...</h2><br />";
		echo "<a href=\"index.php?content=register\">Try again</a><br />";
		echo "<a href=\"index.php\">Home</a><br />";
		exit;
	}

//check for form submission	

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
//minimal validation
if(isset($_POST['email'], $_POST['password'], $_POST['confirmPassword'], $_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zipCode'])){


		//Declare variables
		$userID = trim($_POST['userID']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$confirmPassword = trim($_POST['confirmPassword']);
		$firstName = trim($_POST['firstName']);
		$lastName = trim($_POST['lastName']);
		$phone = trim($_POST['phone']);
		$address = trim($_POST['address']);
		$city = trim($_POST['city']);
		$state = trim($_POST['state']);
		$zipCode = trim($_POST['zipCode']);
		$access = 'U';
		$baduser = 0;  // A flag to detect bad data
		$tablename = 'users';

		//check if email was entered into the form
		$emailFormat = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
		if($email == ''){
			
			echo "<div class='alertBox'>";
			echo "<h2> You must enter an email address. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		// else if regular expression PHP check for email 
		else if(!preg_match($emailFormat,$email)){
				
				echo "<div class='alertBox'>";
				echo "<h2> You must enter a valid email address (abc@pct.edu).</h2><br /> \n";
				echo "</div>";
				$baduser = 1;

				}
				
				
		//check if password was entered into the form
		if($password == ''){
			
			echo "<div class='alertBox'>";
			echo "<h2> You must enter a password. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		//check if confirmPassword was entered into the form
		if($confirmPassword == ''){
			
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your password again. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		//check password and confirm password match
		if($password != $confirmPassword){
		
			echo "<div class='alertBox'>";
			echo "<h2> Your passwords must match. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
	
		//check if firstName was entered into the form
		if($firstName == ''){
		
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your first name. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		//check if lastName was entered into the form
		if($lastName == ''){
		
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your last name. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		
		
		//check if phone was entered into the form
		if($phone == ''){
		
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your phone number. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		
		//check if address was entered into the form
		if($address == ''){
		
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your address. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		//check if city was entered into the form
		if($city == ''){
		
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your city. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		//check if state was entered into the form
		if($state == ''){
		
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your State. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}
		//check if zipCode was entered into the form
		if($zipCode == ''){
		
			echo "<div class='alertBox'>";
			echo "<h2> You must enter your Zip Code. </h2><br /> \n";
			echo "</div>";
			$baduser = 1;
		}	
		
		//check to see if there was any bad data
		if($baduser==0){
			
			//See if the user already exists in the database
			//Use a SELECT query to find out if the user exists
			
			$query = "SELECT email from $tablename WHERE email = '$email';";
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result, MYSQL_ASSOC);
			if($row['email'] == $email){
				echo "<div class='alertBox'>";
				echo"<div id='title'>";
				echo "<h2> Sorry, this email is already in use.</h2><br />\n";
				echo "<a href=\"index.php?content=register\"><h3>Try again</h3></a><br />\n";
				echo "<a href=\"index.php\"><h3>Home</h3></a>\n";
				echo "</div>";
				echo "</div>";
				$baduser=1;
			}
		}//end if
		
		//if valid user information INSERT into the database table
		if($baduser==0){
		
			$query = "INSERT INTO $tablename VALUES ('$userID','$email',SHA1('$password'),SHA1('$confirmPassword'),'$firstName','$lastName','$phone','$address','$city','$state','$zipCode', '$access');";
			//echo ($query);  //debugging technique 
			$result = mysqli_query($db, $query);
			if($result){
				
				//Create a session for the logged in user
				//Set a session variable
				$_SESSION['access'] = $access;

			
				echo "<div class='alertBox'>";
				echo"<div id='title'>";
				echo "<h2> Your registration was successful.</h2><br />\n";
				//echo "<a href=\"index.php\">Home</a><br />\n";
				//Redirect back to index/login
				echo "<META HTTP-EQUIV='Refresh' Content = '1; URL=index.php?content=login'>";
				echo "</div>";
				echo "</div>";
				
				
			}
			else {
				echo "<div class='alertBox'>";
				echo"<div id='title'>";
				echo "<h2> Sorry, there was a problem processing request.</h2><br />\n";
				echo "<a href=\"index.php?content=register\"><h3>Try again</h3></a><br />\n";
				echo "<a href=\"index.php\"><h3>Home</h3></a><br />\n";
				echo "</div>";
				echo "</div>";
			}
		
		} //end if
		
		
  } // end if miminal validation
} // end if form submission		
?>
</div>
</div>
</div>
<div class="infoBox">
	<div class="textBox">
    	<div id="title">
		<h1>Register for a UNIFIT Member Account!</h1>
		<h3>Please enter the following information</h3>
        </div>
    <div id="bottomFormBox">
<form action="index.php" novalidate method="post" target="_self">
<!-- novalidate = "nocvalidate"-->
    <ul>
    	<li><label>Email:</label><input type="text" name="email" maxlength="32"
        	value="<?php  if(isset($_POST['email'])){echo $_POST['email'];}  ?>" required></li>
		<li><label>Password:</label><input type="password" name="password" maxlength="41" required></li>
		<li><label>Confirm Password:</label><input type="password" name="confirmPassword" maxlength="41" required></li>
		<li><label>First Name:</label><input type="text" name="firstName" maxlength="20"
        	value="<?php  if(isset($_POST['firstName'])){echo $_POST['firstName'];}  ?>" required></li>
		<li><label>Last Name:</label><input type="text" size="20" name="lastName"
			value="<?php  if(isset($_POST['lastName'])){echo $_POST['lastName'];}  ?>" required></li>
        </ul>
        <ul>
        <li><label>Phone Number:</label><input type="text" maxlength="11" name="phone"
			value="<?php  if(isset($_POST['phone'])){echo $_POST['phone'];}  ?>" required></li>
        <li><label>Address:</label><input type="text" maxsize="50" name="address"
			value="<?php  if(isset($_POST['address'])){echo $_POST['address'];}  ?>" required></li>
        <li><label>City:</label><input type="text" maxlength="20" name="city"
			value="<?php  if(isset($_POST['city'])){echo $_POST['city'];}  ?>" required></li>
        <li><label>State:</label><select name="state"
			value="<?php  if(isset($_POST['state'])){echo $_POST['state'];}  ?>" required>
				      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">Dist of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
            </select></li>
        <li><label>Zip Code:</label><input type="text" maxlength="11" name="zipCode"
			value="<?php  if(isset($_POST['zipCode'])){echo $_POST['zipCode'];}  ?>" required></li>
     </ul>
<div id="formBox">     
<input type="submit" class="miniButton" value="Submit" />
<input type="reset" class="miniButton" value="Reset" />
<input type="hidden" name="content" value="register">
</form>
</div>
</div>
</div>
</div>
</div>
</div>