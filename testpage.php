<?php
	session_start();
	require('functions.php');
	require('config.php');
	authTest();
	include("banner.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
	Test
		<?php
			//session_start();
			
			//require('functions.php');
			
			
				$uname = $_SESSION['uname'];	
				$sql =  mysqli_query($link,"SELECT `fname` FROM `Users` WHERE `username` = '$uname'");
				$fname = mysqli_fetch_object($sql);
				$fname = $fname->fname;
				echo $fname;
				
				
		?>
				
			
				
				
			
		
		
	</body>
</html>