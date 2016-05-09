<html>
	<head>
		<title>Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
	<?php 
			session_start();
			require('config.php');
			include("banner.php");
			
				
				if(isset($_SESSION['uname'])){
					include("welcome.php");
				}else{
					include("login.php");
				}
				
				
				if(isset($_GET['adminerr'])){
					echo "Only administrators can access that page. <br />";
				}
		
		?>
		
				
				
			
		
		
	</body>
</html> 