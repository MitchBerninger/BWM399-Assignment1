<?php
echo <<<EOB
<div class="navi">
<ul>
	<li>$loggedName | </li>
	<li><a href="index.php?content=about">About</a></li>
	<li><a href="index.php?content=members">Memberships</a></li>
	<li><a href="index.php?content=contact">Contact</a></li>
	<li><a href="index.php?content=logout">Logout</a></li>

</ul>
</div>

EOB;
?>