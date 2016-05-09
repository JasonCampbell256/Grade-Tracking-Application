<?php
	require('functions.php');
	authHead();
?>
<html>
	<head>
		<title>Add To Roster - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
	
		<form method="POST">
		Enter a student ID: <input type="text" name="student_id" /><br />
		<input type="submit" name="submit" value="Log in" /><br />
		</form>
		
		<?php
		$studentID = mysql_escape_string($_POST['student_id']);
		$classID  = $_GET['classID'];
			
		if(isset($_POST['submit'])){
					
				mysql_query("INSERT INTO `Roster` (`student_id`, `class_id`) 
				VALUES ('$studentID', '$classID')") or die(mysql_error());

			}
			
			?>
		
	</body>
</html>