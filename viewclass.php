<?php
	require('functions.php');
	authHead();
?>
<html>
	<head>
		<title>View Classes - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		<ul>
		<?php			
			//Content goes in this if statement
				
			if(!isset($_GET['page'])){
				
					//Fetches user's first name from DB and displays it
					$uname = $_SESSION['uname'];		
					echo $uname."'s classes: <br />";
					
					$id = $_SESSION['id'];
					$sql = "SELECT * FROM `Classes` WHERE `staff_id` = '$id'";
					$classQuery = mysql_query($sql);
					
					while($test = mysql_fetch_assoc($classQuery)){
						?>
						<a href="class.php?page=class&classID=<?php echo $test['class_id']; ?>"><?php echo "<li>".$test['subject']."</li>"; ?></a>
						
						
						
						<?php
						
					}
		
					?>
					<p />
						<a href="newclass.php">Create a new class</a><br />
						<a href="remclass.php">Delete a class</a><br />
					<?php

			
			}else{
				echo "Yay";
			}
				
		?>
		</ul>
		
			
				
				
			
		
		
	</body>
</html>