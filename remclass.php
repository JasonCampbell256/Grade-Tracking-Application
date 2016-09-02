<?php
	require('functions.php');
    require('config.php');
	authHead();
?>
<html>
	<head>
		<title>Delete Classes - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		<ul>
		<?php			
			//Content goes in this if statement
				
			if(!isset($_GET['page'])){
				
					echo "Choose a class to delete<br />";
					//Fetches user's first name from DB and displays it
					$uname = $_SESSION['uname'];					
					echo $uname."'s classes: <br />";
					
					
					$id = $_SESSION['id'];
					$sql = "SELECT * FROM `Classes` WHERE `staff_id` = '$id'";
					$classQuery = mysqli_query($link,$sql);
					
					while($test = mysqli_fetch_assoc($classQuery)){
						?>
						<a href="remclass.php?page=class&classID=<?php echo $test['class_id']; ?>"><?php echo "<li>".$test['subject']."</li>"; ?></a>
						<?php
						
					}
					
					
					
					exit();

			
			}else{
				$remID = $_GET['classID'];
				if(isset($_GET['classID'])){
					$remID = $_GET['classID'];?>
					Are you sure you want to remove this class?<br />
					<a href="remclass.php?page=class&remClassID=<?php echo $remID; ?>">Yes<br/></a>
					<a href="viewclass.php">No<br /></a>
			<?php	}
				
					if(isset($_GET['remClassID'])){
						$remID = $_GET['remClassID'];
						$sql = "DELETE FROM `Classes` WHERE `class_id` = '$remID'";
						mysqli_query($link,$sql) or die(mysql_error());
						echo 'Deleted! <a href="viewclass.php">Click here to return.<br /></a>';
					}
				
			}
				
		?>
		</ul>
			
				
				
			
		
		
	</body>
</html>