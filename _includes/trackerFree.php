<?php
//check for form submission	
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//minimal validation
	if(isset($_POST['userID'], $_POST['exerciseName'], $_POST['weight'])){
		//Declare Variables
		$userID = $_SESSION['validUser'];
		$muscleGroup = trim($_POST['muscleGroup']);
		$exerciseName = trim($_POST['exerciseName']);
		$weight = trim($_POST['weight']);
		$sets = trim($_POST['sets']);
		$reps = trim($_POST['reps']);
		$baduser = 0;  // A flag to detect bad data
		$tableFree = 'trackerFree';
		
		//check if exerciseName was entered into the form
		if($exerciseName == ''){
		
			echo "<h2> You must enter an Exercise Name. </h2><br /> \n";
			$baduser = 1;
		}
		//check if weight was entered into the form
		if($weight == ''){
		
			echo "<h2> You must enter the weight for this workout. </h2><br /> \n";
			$baduser = 1;
		}
		//if valid user information INSERT into the database table
		if($baduser==0){
		
			$freeQuery = "INSERT INTO $tableFree VALUES('','$userID','$muscleGroup','$exerciseName','$weight', '$sets', '$reps');";
			//echo ($query);  //debugging technique 
			$freeResult = mysqli_query($db, $freeQuery);
			if($freeResult){
				
				
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