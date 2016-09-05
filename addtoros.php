<!doctype html>
<html>
	<head>
		<title>Add To Roster - Grade Tracking Application</title>
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
            <form method="POST">
                Enter a student ID: <input type="text" name="student_id" /><br />
                <input type="submit" name="submit" value="Log in" /><br/>
            </form>
                <?php
                    $studentID = mysqli_real_escape_string($link, $_POST['student_id']);
                    $classID  = $_GET['classID'];

                    if (isset($_POST['submit'])) {
				        mysqli_query($link,"INSERT INTO `Roster` (`student_id`, `class_id`) 
				        VALUES ('$studentID', '$classID')") or die(mysql_error());
                    }
			     
                ?>
            </article>
		</div>
	</body>
</html>