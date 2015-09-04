<?php
//check for form submission	
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//minimal validation
	if(isset($_POST['userID'], $_POST['cardioType'], $_POST['length'])){
		//Declare Variables
		$userID = $_SESSION['validUser'];
		$cardioType = trim($_POST['cardioType']);
		$length = trim($_POST['length']);
		$distance = trim($_POST['distance']);
		$location = trim($_POST['location']);
		$heartRate = trim($_POST['heartRate']);
		$baduser = 0;  // A flag to detect bad data
		$tableCardio = 'trackerCardio';
		
		//check if cardioType was entered into the form
		if($cardioType == ''){
		
			echo "<h2> You must choose your Cardio Exercise. </h2><br /> \n";
			$baduser = 1;
		}
		//check if length was entered into the form
		if($length == ''){
		
			echo "<h2> You must enter your exercise duration. </h2><br /> \n";
			$baduser = 1;
		}
		//if valid user information INSERT into the database table
		if($baduser==0){
		
			$cardioQuery = "INSERT INTO $tableCardio VALUES('','$userID','$cardioType','$length','$distance', '$location', '$heartRate');";
			//echo ($cardioQuery);  //debugging technique 
			$cardioResult = mysqli_query($db, $cardioQuery);
			if($cardioResult){
				
				
				echo "<div class='alertBox'>";
				echo"<div id='title'>";
				echo "<h2>Your Fitness Tracker was successfully updated!.\n";
				echo "<META HTTP-EQUIV='Refresh' Content = '2; URL=index.php?content=fittracker'>";
				echo "</div>";
				echo "</div>";

				
			}
			else {
				echo "<div class='alertBox'>";
				echo"<div id='title'>";
				echo "<h2>Sorry, there was an issue.</h2>\n";
				echo "<h2>Please enter your workout information again.</h2>\n";
				//echo "<META HTTP-EQUIV='Refresh' Content = '2; URL=index.php?content=fittracker'>";
				echo "</div>";
				echo "</div>";
			}
		
		} //end if
		else{
			echo"<META HTTP-EQUIV='Refresh' Content = '2; URL=index.php?content=fittracker'>";
			}
		
  } // end if miminal validation
} // end if form submission
?>