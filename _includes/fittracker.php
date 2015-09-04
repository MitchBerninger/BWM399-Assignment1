<div class="tracker">
<div class="trackerHeader">
<div id="bannerText">
		<img src="_images/trackerBanner.png">
</div>
</div>
<div class="errorBox">
<div class="alertText">
<?php

//include the database connection
include('dbconnect.php');
if(!isset($_SESSION['validUser'])){
	include('_includes/accessdenied.php');
	exit;
}
//check to if the connection was successful
if(!$db){
		echo "<div class='alertBox'>";
		echo"<div id='title'>";
		echo "<h2> Sorry we cannot process your request at this time. Please try again later...</h2><br />";
		echo "<a href=\"index.php\"><h3>Home</h3></a><br />";
		echo "</div>";
		echo "</div>";
	}

	include('_includes/trackerCardio.php');
	include('_includes/trackerFree.php');	
	include('_includes/trackerMachine.php');	
?>
</div>
</div>
<div class="infoBox">
    <div class="textBox">
    	<div id="title">
        	<h2>Fitness Tracker</h2>
        </div>
<!--------------------------------------------------- Cardio Form --------------------------------------------------->
        <div class="textSegment">
        	<h3>Cardio</h3> 
<form action="index.php" novalidate method="post" target="_self">
<input type="hidden" name="userID"/>	
	<ul>
        <li><label>Cardio Type</label><select name="cardioType" 
        	value="<?php  if(isset($_POST['cardioType'])){echo $_POST['cardioType'];}  ?>" required>
            	<option value="Run">Run</option>
                <option value="Walk">Walk</option>
                <option value="Bike">Bike</option>
                <option value="Zumba">Zumba</option>
            </select></li>
        <li><label>Workout Length</label><input type="text" name="length" maxlength="10" placeholder="1.5h"
        	value="<?php  if(isset($_POST['length'])){echo $_POST['length'];}  ?>"></li>
        <li><label>Distance</label><input type="text" name="distance" maxlength="10" placeholder="3 mil"
        	value="<?php  if(isset($_POST['distance'])){echo $_POST['distance'];}  ?>"></li>
        <li><label>Location</label><input type="text" name="location" maxlength="20" placeholder="Optional"
        	value="<?php  if(isset($_POST['location'])){echo $_POST['location'];}  ?>"></li>
        <li><label>Heart Rate</label><input type="text" name="heartRate" maxlength="3" placeholder="85"
        	value="<?php  if(isset($_POST['heartRate'])){echo $_POST['heartRate'];}  ?>"></li>
    </ul>
<input type="submit" class="miniButton" value="Submit" />
<input type="reset" class="miniButton" value="Reset" />
<input type="hidden" name="content" value="fittracker" />

</form>
            <div class="trackerButtons">
            	<div class="buttonBox">
    				<div class="bigButton">
                    	<a href="index.php?content=showCardio"><img src="_images/progressBadge.png"></a>
                    </div>
                 </div>
            </div>
            <div class="clear"></div>
         </div>
        </div>
<div class="clear"></div> 
<!--------------------------------------------------- Free Weight Form --------------------------------------------------->
    <div class="textBox">
        <div class="textSegment">
        	<h3>Free Weights</h3> 
<form action="index.php" novalidate method="post" target="_self">
<input type="hidden" name="userID"/>	
	<ul>
        <li><label>Muscle Group</label><input type="text" name="muscleGroup" maxlength="20" placeholder="Triceps, Abs, Legs"
        	value="<?php  if(isset($_POST['muscleGroup'])){echo $_POST['muscleGroup'];}  ?>"></li>
        <li><label>Exercise Name</label><input type="text" name="exerciseName" maxlength="20" placeholder="Bicep Curls, Chin Ups, Bench Press"
        	value="<?php  if(isset($_POST['exerciseName'])){echo $_POST['exerciseName'];}  ?>"></li>
        <li><label>Weight</label><input type="text" name="weight" maxlength="10" placeholder="50lbs"
        	value="<?php  if(isset($_POST['weight'])){echo $_POST['weight'];}  ?>"></li>
        <li><label>Sets</label><input type="text" name="sets" maxlength="6" placeholder="5"
        	value="<?php  if(isset($_POST['sets'])){echo $_POST['sets'];}  ?>"></li>
        <li><label>Reps</label><input type="text" name="reps" maxlength="6" placeholder="15"
        	value="<?php  if(isset($_POST['reps'])){echo $_POST['reps'];}  ?>"></li>
    </ul>
<input type="submit" class="miniButton" value="Submit" />
<input type="reset" class="miniButton" value="Reset" />
<input type="hidden" name="content" value="fittracker" />

</form>
            <div class="trackerButtons">
            	<div class="buttonBox">
    				<div class="bigButton">
                    	<a href="index.php?content=showFree"><img src="_images/progressBadge.png"></a>
                    </div>
                 </div>
            </div>
            <div class="clear"></div>
         </div>
        </div>
<div class="clear"></div>
<!--------------------------------------------------- Workout Machine Form --------------------------------------------------->
    <div class="textBox">
        <div class="textSegment">
        	<h3>Workout Machines</h3> 
<form action="index.php" novalidate method="post" target="_self">
<input type="hidden" name="userID"/>	
	<ul>
        <li><label>Muscle Group</label><input type="text" name="MmuscleGroup" maxlength="20" placeholder="Triceps, Abs, Legs"
        	value="<?php  if(isset($_POST['MmuscleGroup'])){echo $_POST['MmuscleGroup'];}  ?>"></li>
        <li><label>Machine Name</label><input type="text" name="machineName" maxlength="20" placeholder="Row Machine, Thigh Buster, Bicep Curl"
        	value="<?php  if(isset($_POST['machineName'])){echo $_POST['machineName'];}  ?>"></li>
        <li><label>Weight</label><input type="text" name="Mweight" maxlength="10" placeholder="50lbs"
        	value="<?php  if(isset($_POST['Mweight'])){echo $_POST['Mweight'];}  ?>"></li>
        <li><label>Sets</label><input type="text" name="Msets" maxlength="6" placeholder="5"
        	value="<?php  if(isset($_POST['Msets'])){echo $_POST['Msets'];}  ?>"></li>
        <li><label>Reps</label><input type="text" name="Mreps" maxlength="6" placeholder="15"
        	value="<?php  if(isset($_POST['Mreps'])){echo $_POST['Mreps'];}  ?>"></li>
    </ul>
<input type="submit" class="miniButton" value="Submit" />
<input type="reset" class="miniButton" value="Reset" />
<input type="hidden" name="content" value="fittracker" />

</form>
            <div class="trackerButtons">
            	<div class="buttonBox">
    				<div class="bigButton">
                    	<a href="index.php?content=showMachine"><img src="_images/progressBadge.png"></a>
                    </div>
                 </div>
            </div>
            <div class="clear"></div>
         </div>
        </div>
<div class="clear"></div>

</div> <!-- End infoBox -->
</div>