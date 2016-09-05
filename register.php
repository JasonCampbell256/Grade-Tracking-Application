<!doctype html>
<html>
<head>
	<title>Register - Grade Tracking Application</title>
	
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div id="wrapper">
        <header>
            <?php 
                require('config.php');
                include("banner.php");
                session_start();
            ?>
        </header>

        <article id="one">
            <form action="regform.php" method="POST">
                First Name: <input type = "text" name="name" /> <br />
                Last Name: <input type = "text" name="lname" /> <br />
                Username: <input type = "text" name="uname" /> <br />
                Email: <input type = "text" name="email1" /> <br />
                Confirm Email <input type="text" name="email2" /> <br />
                Password: <input type="password" name="pass1" /> <br />
                Confirm Password: <input type="password" name="pass2" /> <br />
                <input type="submit" value="Register" name="submit" />
            </form>
        </article>
    </div>
</body>


</html>