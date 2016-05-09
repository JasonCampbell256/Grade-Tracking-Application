<?php
	require('functions.php');
	authHead();
?>
<html>
	<head>
		<title>Class Roster - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
	
		<table border = 1>
			<tr>
				<td>Student ID</td>
				<td>First Name</td>
				<td>Last Name</td>
			</tr>
		
		<?php
			$test  = $_GET['classID'];
			$result = mysql_query("SELECT `student_id` FROM `Roster` WHERE `class_id` = '$test'");
			while( $row = mysql_fetch_assoc( $result)){
				$new_array[] = $row["student_id"]; // Inside while loop
				}
			$imp = implode(",", $new_array);

			
			$result = mysql_query("SELECT * FROM `Students` WHERE `student_id` IN($imp)");
			while( $row = mysql_fetch_array($result)){
				printf("<tr><td>%s</td> <td>%s</td> <td>%s</td> <br />", $row["student_id"], $row["first_name"], $row["last_name"]);
			}
			?> 
			
		</table><br />
		
		<a href="addtoros.php?classID=<?php echo $test; ?>">Add Student to Roster</a>
		
		
	</body>
</html>