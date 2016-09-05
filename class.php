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
            <?php
                if (isset($_GET['classID'])) {
                    $classID = $_GET['classID'];
                    $sql = "SELECT * FROM `Classes` WHERE `class_ID` = '$classID'";
                    $query = mysqli_query($link,$sql);
                    $blah = mysqli_fetch_assoc($query);
		
		
                    echo "<h3>Class Administration: ".$blah['subject']."</h3>";
            ?>
		
                <a href="roster.php?classID=<?php echo $classID; ?>">View Roster</a><br />
                <a href="grade.php?classID=<?php echo $classID; ?>">Input Grades</a><br />
                <a href="assigntypes.php?classID=<?php echo $classID; ?>">Manage Assignment Types</a><br />
                <a href="manassign.php?classID=<?php echo $classID; ?>">Manage Assignments</a><br />
        
            <?php
                } else {
                    echo "Error";
                }
            ?>
			
            </article>
        </div>	
	</body>
</html>