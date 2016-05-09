<html>
	<head>
		<title>Grade Tracking Application - Help</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
	<?php 
			session_start();
			require('config.php');
			include("banner.php");
    ?>
			

				<h4>Registration</h4>
                    Before using the application, instructors must first create an account. Click on the registration link
                    on the home page. Fill out all required information and click the "Register" button. After registering,
                    contact the database administrator to have your account activated.<p>
        
                <h4>Creating a Class</h4>
                    All classes being taught will be registered on the database. To create a new class, click "View your classes" then,
                    click on "Create a New Class." Fill in the required information and click the "Create Class" button. Your class 
                    should now be visible via the "View your classes" link.<p>
                
                <h4>Creating Assignment Types</h4>
                    Before you can create assignments, you must first declare your assignment types. Examples of assignment types 
                    include but are not limited to: Tests, Quizzes, and Homework. To view new assignment types, select the 
                    appropriate class from the "View Classes" screen, and click the "Manage Assignment Types" link. All previously 
                    created assignments for the class will be listed here. To create a new assignment type, click the "Create New Assignment Type" link and complete the form.<p>
        
                <h4>Managing Students</h4>
                    To view students in your class, click the "View Roster" link in the "View Classes" screen. This page will 
                    list all students assigned to the course. To add students, click the "Add Student to Roster" link, and enter 
                    the student id associated with the student. <p>
        
                
                    
	</body>
</html> 