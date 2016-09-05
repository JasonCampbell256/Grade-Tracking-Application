<!doctype html>
<html>
	<head>
		<title>Manage Assignments - Grade Tracking Application</title>
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
	
		<table border=1>
            <tr><td>ID</td><td>Name</td><td>Type</td></tr>
			<?php
			$classID = $_GET['classID'];
			$result = mysqli_query($link,"SELECT * FROM `Assignment_Types` WHERE `class_id` = '$classID'");
			while( $row = mysqli_fetch_assoc( $result)){
				$new_array[] = $row["type_id"]; // Inside while loop
				}
				$imp = "'".implode("', '", $new_array) ."'";
			$result = mysqli_query($link,"SELECT * FROM `Assignments` WHERE (`type` IN($imp))");
			while( $row = mysqli_fetch_array($result)){
				printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row["assignment_id"], $row["assignment_name"], $row["type"]);
			}

		?>
            </table>
		<a href="newassign.php?classID=<?php echo $classID; ?>">Create a New Assignment</a><br />
            </article>
        </div>
	</body>
</html>