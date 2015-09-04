<div class="header">
<div id="mainHeader">
    	<?php
			include('_includes/header.php');
		?>
</div>
</div>
<div id="home">
<div class="infoBox">
    <div class="textBox">
    	<div id="title">
        	<h2>Welcome to UNIFIT</h2>
        </div>
        <div class="textSegment">
            <p>Make yourself comfy. Because we’re Judgement Free. It doesn’t matter if your legs have never seen a squat machine before. We believe how you work out is totally up to you. Take advantage of our personal trainers or just do your own thing on the treadmill, we’ll cheer you on either way - if you’re in our house you deserve a little cred just for being here.</p>
            
            <p>We believe no one should ever feel Gymtimidated by Lunky behavior and that everyone should feel at ease in our gyms, no matter what his or her workout goals are. And everyone should have access to lots of nice new equipment and feel comfortable asking for help. With all of these great benefits under one roof, we like to say: </p><h3>One Gym Fits All</h3>
		</div>
    <div class="buttonBox">
    	<div class="bigButton">
<?php
	//Check for logged in user
	if(!isset($_SESSION['validUser'])){	
echo <<<EOB
<ul>
<a href="index.php?content=register"><li>Register</li></a>
</ul>
EOB;
}
else{
$loggedUser = $_SESSION['validUser'];
echo <<<EOB
<a href="index.php?content=fittracker"><img src="_images/fitnessButton.png"></a>
EOB;
}
?>
        </div>
        <div class="bigButton">
<a href="index.php?content=members"><img src="_images/membershipsButton.png"></a>
    </div>
    </div>
<div class="clear"></div>
</div>
</div>