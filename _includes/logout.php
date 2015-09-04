<?php
//$_Session=array(); //Destroys all session variables 
//session_start(); //Retrieves current session if not already in our index.php
session_destroy();  //destroys the session

echo "<META HTTP-EQUIV='Refresh' Content = '0; URL=index.php'>";
?>
