<!doctype html>

<html>
	<head>
		<title>Class Roster - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
        <div id="wrapper">
            <header>
                <?php
                    require('functions.php');
                    require('config.php');
                    authHead();
                ?>
            </header>
	       <article id="one">
		<table border = 1>
			<tr>
				<td>Student ID</td>
				<td>First Name</td>
				<td>Last Name</td>
			</tr>
		
		<?php
			$test  = $_GET['classID'];
			$result = mysqli_query($link,"SELECT `student_id` FROM `Roster` WHERE `class_id` = '$test'");
			while( $row = mysqli_fetch_assoc( $result)){
				$new_array[] = $row["student_id"]; // Inside while loop
				}
			$imp = implode(",", $new_array);

			
			$result = mysqli_query($link,"SELECT * FROM `Students` WHERE `student_id` IN($imp)");
			while( $row = mysqli_fetch_array($result)){
				printf("<tr><td>%s</td> <td>%s</td> <td>%s</td> <br />", $row["student_id"], $row["first_name"], $row["last_name"]);
			}
			?> 
			
		</table><br />
		
		<a href="addtoros.php?classID=<?php echo $test; ?>">Add Student to Roster</a>
            </article>
        </div>
	</body>
</html>