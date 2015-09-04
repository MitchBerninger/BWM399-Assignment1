<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>UniFit Gym | One Gym Fits All</title>
<link rel="stylesheet" type="text/css" href="_css/reset.css" />
<link rel="stylesheet" type="text/css" href="_css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="logo">
		<a href="/assignment1"><img src="_images/UnifitLogo.png"></a>
    <div class="nav">
		<?php
			include('_includes/nav.php');
		?>
	</div>
    </div>
    
    <div class="main">
    	<?php
	 		if(!isset($_REQUEST['content'])){
	 			include('_includes/main.php');
	 		}
	 		else {
	 		
	 			$content = $_REQUEST['content'];
	 			$nextpage = $content.'.php';
	 			include('_includes/'.$nextpage);
	 		}
	 	?>
    </div>
    <div id="footer">
	  <div align="center">
	  <?php
			include('_includes/footer.php');
	  ?>
	</div>
	</div>
</body>
</html>