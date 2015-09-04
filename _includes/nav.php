<?php
	//Check for logged in user
	if(!isset($_SESSION['validUser'])){	
echo <<<EOB
<div class="navi">
<ul>
   		<li><a href="index.php?content=login">Login</a></li>
   		<li><a href="index.php?content=register">Register</a></li>
		<li>|</li>
		<li><a href="index.php?content=about">About</a></li>
		<li><a href="index.php?content=members">Memberships</a></li>
		<li><a href="index.php?content=contact">Contact</a></li>
</ul>
</div>
EOB;
}
else if(isset($_SESSION['access'])){
$loggedUser = $_SESSION['validUser'];
$loggedName = $_SESSION['fullname'];
$loggedAccess = $_SESSION['access'];
if($loggedAccess == 'U'){			
			include('_includes/navmain.php');
			include('_includes/navu.php');
}
else{
			include('_includes/navmain.php');
			include('_includes/navu.php');
			include('_includes/nava.php');

}
}
?>