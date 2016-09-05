<!doctype html>
<html>
	<head>
		<title>Admin Control Panel - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
        <div id="wrapper">
            <header>
                <?php
                    require('functions.php');
                    require('config.php');
                    adminCheck();
                    authHead();
                ?>
            </header>
            
            <article id="one">
            <a href="newstu.php">Create Students</a><br />
            </article>
        </div>
	</body>
</html>