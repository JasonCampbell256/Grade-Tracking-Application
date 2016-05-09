<?php
	require('functions.php');
	authHead();
?>
<html>
	<head>
		<title>New Assignment - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		<?php $classID  = $_GET['classID']; ?>
			<form method="POST">
			Assignment Name: <input type="text" name="assname" /><br />
			Assignment Type: <select name="tname">
									<?php 
										$result = mysql_query("SELECT * FROM `Assignment_Types` WHERE `class_id` = '$classID'");
										while( $row = mysql_fetch_array($result)){
											printf("<option value=\"%s\">%s</option>", $row["type_id"], $row["type_id"]);
				
										}
									?>
								</select><br />
			<input type="submit" name="submit" value="Submit" /><br />
			</form>
		
		<?php
			$assname = mysql_escape_string($_POST['assname']);
			$tname = mysql_escape_string($_POST['tname']);
			
			
			
		if(isset($_POST['submit'])){
					
				mysql_query("INSERT INTO `Assignments` (`class_id`, `type`, `assignment_name`) 
				VALUES ('$classID', '$tname', '$assname')") or die(mysql_error());

			}
			
			?>
		
		
	
	</body>
</html>