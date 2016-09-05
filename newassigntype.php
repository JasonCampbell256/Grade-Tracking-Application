<!doctype html>
<html>
	<head>
		<title>Create New Assignment Type - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
        <div id = "wrapper">
            <header>
            <?php
                require('functions.php');
                require('config.php');
                authHead();
            ?>
            </header>
        
        <article id="one">    
		<form method="POST">
		Assignment Type (Quiz, Test, etc): <input type="text" name="tname" /><br />
		Percentage of Final Grade: <input type="text" name="percentage" /><br />
		<input type="submit" name="submit" value="Submit" /><br />
		</form>
		
		<?php
		$classID  = $_GET['classID'];
		$tname = mysqli_real_escape_string($link, $_POST['tname']);
		$percentage = mysqli_real_escape_string($link, $_POST['percentage']);
			
		if(isset($_POST['submit'])){
					
				mysqli_query($link,"INSERT INTO `Assignment_Types` (`class_id`, `type_id`, `percentage`) 
				VALUES ('$classID', '$tname', '$percentage')") or die(mysql_error());

			}
			
			?>
            </article>
        </div>
	</body>
</html>