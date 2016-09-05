<!doctype html>
<html>
	<head>
		<title>Create a Class - Grade Tracking Application</title>
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
                    <h2>Create a class</h2>

					<form action="newclassquery.php" method="POST">
					Subject: <input type="text" name="subject" /><br />
					Term: <select name="term">
						<option value="spring">Spring</option>
						<option value="fall">Fall</option></select><br />
					Year: <select name="year">
						<option value="2015">2015</option>
						<option value="2016">2016</option></select><br /><br />
					<input type="submit" value="Create Class" name="submit" />
					</form>
            </article>
        </div>
	</body>
</html>