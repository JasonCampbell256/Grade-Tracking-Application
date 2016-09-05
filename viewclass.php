<!doctype html>
<html>
	<head>
		<title>View Classes - Grade Tracking Application</title>
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
		<ul>
		<?php			
			//Content goes in this if statement
				
			if(!isset($_GET['page'])){
				
					//Fetches user's first name from DB and displays it
					$uname = $_SESSION['uname'];		
					echo $uname."'s classes: <br />";
					
					$id = $_SESSION['id'];
					$sql = "SELECT * FROM `Classes` WHERE `staff_id` = '$id'";
					$classQuery = mysqli_query($link, $sql);
                
					if ($classQuery){
				        while($test = mysqli_fetch_assoc($classQuery)){
            ?>
                            <a href="class.php?page=class&classID=<?php echo $test['class_id']; ?>"><?php echo "<li>".$test['subject']."</li>"; ?></a>
						
						
						
            <?php
                        }
					}
                
                    else {
                        $error = mysqli_error($link);
                        echo $error;
                        echo "No result";
                    }
                    mysqli_free_result($classQuery);
                        
		
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
                </article>
        </div>
	</body>
</html>