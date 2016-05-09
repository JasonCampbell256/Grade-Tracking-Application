<?php
	require('functions.php');
	authHead();
?>
<html>
	<head>
		<title>Create New Assignment Type - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		<form method="POST">
		Assignment Type (Quiz, Test, etc): <input type="text" name="tname" /><br />
		Percentage of Final Grade: <input type="text" name="percentage" /><br />
		<input type="submit" name="submit" value="Submit" /><br />
		</form>
		
		<?php
		$classID  = $_GET['classID'];
		$tname = mysql_escape_string($_POST['tname']);
		$percentage = mysql_escape_string($_POST['percentage']);
			
		if(isset($_POST['submit'])){
					
				mysql_query("INSERT INTO `Assignment_Types` (`class_id`, `type_id`, `percentage`) 
				VALUES ('$classID', '$tname', '$percentage')") or die(mysql_error());

			}
			
			?>

		
	</body>
</html>