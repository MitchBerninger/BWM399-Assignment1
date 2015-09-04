<?php
//check for form submission	
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//minimal validation
	if(isset($_POST['userID'], $_POST['machineName'], $_POST['Mweight'])){
		//Declare Variables
		$userID = $_SESSION['validUser'];
		$MmuscleGroup = trim($_POST['MmuscleGroup']);
		$machineName = trim($_POST['machineName']);
		$Mweight = trim($_POST['Mweight']);
		$Msets = trim($_POST['Msets']);
		$Mreps = trim($_POST['Mreps']);
		$baduser = 0;  // A flag to detect bad data
		$tableMachine = 'trackerMachine';
		
		//check if machineName was entered into the form
		if($machineName == ''){
		
			echo "<h2> You must enter a Machine Name. </h2><br /> \n";
			$baduser = 1;
		}
		//check if weight was entered into the form
		if($Mweight == ''){
		
			echo "<h2> You must enter the weight for this workout. </h2><br /> \n";
			$baduser = 1;
		}
		//if valid user information INSERT into the database table
		if($baduser==0){
		
			$query = "INSERT INTO $tableMachine VALUES('','$userID','$MmuscleGroup','$machineName','$Mweight', '$Msets', '$Mreps');";
			//echo ($query);  //debugging technique 
			$result = mysqli_query($db, $query);
			if($result){
				
				
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