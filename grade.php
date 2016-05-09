<?php
	require('functions.php');
	authHead();
?>
<html>
	<head>
		<title>Input Grades - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		<?php
			$classID  = $_GET['classID'];?> 
			
		<form method="POST"> 
			Student: <select name="student_id">
				<?php 
                    //Query all students into class and create an arry
				    $result = mysql_query("SELECT `student_id` FROM `Roster` WHERE `class_id` = '$classID'");
				    while( $row = mysql_fetch_assoc( $result)){
				        $new_array[] = $row["student_id"]; // Inside while loop
				    }	
				    $imp = implode(",", $new_array);
                    
                    //Display in the list, all students in the class
                    $result = mysql_query("SELECT * FROM `Students` WHERE `student_id` IN($imp)");
				    while( $row = mysql_fetch_array($result)){
				        printf("<option value=\"%s\">%s, %s</option>", $row["student_id"], $row["last_name"], $row["first_name"]);
				    }
				?>
				</select><br />
            
			Assignment: <select name="assignment_id">
                <?php 
                    //Query all assignments in the class and display them in the list
				    $result = mysql_query("SELECT * FROM `Assignments` WHERE `class_id` = '$classID'");
				    while( $row = mysql_fetch_array($result)){
				        printf("<option value=\"%s\">%s, %s</option>", $row["assignment_id"], $row["assignment_name"], $row["assignment_id"]);
                    }
                ?>  
				</select><br />
            
            Score: <input type="text" name="score"><br />
            <input type="submit" name="submit" value="Submit" /><br />
        </form>
        
        <?php              
            if(isset($_POST['submit'])){
                $studentID = mysql_escape_string($_POST['student_id']);
                $assignmentID = mysql_escape_string($_POST['assignment_id']);
                $score = mysql_escape_string($_POST['score']);
					
                mysql_query("INSERT INTO `Scores` (`student_id`, `assignment_id`, `score`) 
                VALUES ('$studentID', '$assignmentID', '$score')") or die(mysql_error());
            }
        ?>           
			
			
		

	
		
		
	</body>
</html>