<!doctype html>
<html>
	<head>
		<title>New Assignment - Grade Tracking Application</title>
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
            
            <article id= "one">
                <?php $classID  = $_GET['classID']; ?>
            <form method="POST">
			Assignment Name: <input type="text" name="assname" /><br />
			Assignment Type: <select name="tname">
									<?php 
										$result = mysqli_query($link,"SELECT * FROM `Assignment_Types` WHERE `class_id` = '$classID'");
										while( $row = mysqli_fetch_array($result)){
											printf("<option value=\"%s\">%s</option>", $row["type_id"], $row["type_id"]);
				
										}
									?>
								</select><br />
			<input type="submit" name="submit" value="Submit" /><br />
			</form>
		
		<?php
			$assname = mysqli_real_escape_string($link, $_POST['assname']);
			$tname = mysqli_real_escape_string($link, $_POST['tname']);
			
			
			
		if(isset($_POST['submit'])){
					
				mysqli_query($link,"INSERT INTO `Assignments` (`class_id`, `type`, `assignment_name`) 
				VALUES ('$classID', '$tname', '$assname')") or die(mysql_error());

			}
			
			?>
		
            </article> 
        </div>
	</body>
</html>