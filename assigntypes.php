<?php
	require('functions.php');
	authHead();
?>
<html>
	<head>
		<title>Manage Assignment Types - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		<table border="1">
			<tr>
				<td>Assignment Type</td>
				<td>Percentage of Final Grade </td>
			</tr>
			<?php 
				$classID  = $_GET['classID']; 	
				$result = mysql_query("SELECT * FROM `Assignment_Types` WHERE `class_id` = '$classID'");
				while( $row = mysql_fetch_array($result)){
				printf("<tr><td>%s</td><td>%s</td></tr>", $row["type_id"], $row["percentage"]);
				}
	
			
	
			?>
			</table><br />
		
		<a href="newassigntype.php?classID=<?php echo $classID; ?>">Create New Assignment Type</a><br />

		
	</body>
</html>