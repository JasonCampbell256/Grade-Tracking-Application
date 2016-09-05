<!doctype html>
<html>
	<head>
		<title>Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	
    <body>	
        <div id="wrapper">
        <header>
               <?php
                    session_start();
                    require('config.php');
                    include("banner.php");
                    echo $_SESSION['uname'];
               ?>
        </header>
            
            
            
            <article id="one">
            <?php
                if(isset($_SESSION['uname'])){
                    include("welcome.php");
				}else{
					include("login.php");
                    echo $_SESSION['uname'];
				}
				
				if(isset($_GET['adminerr'])){
					echo "Only administrators can access that page. <br />";
				}
            ?>
            </article>
		</div>
	</body>
</html> 