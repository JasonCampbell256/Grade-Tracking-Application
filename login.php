<?php 
session_start();
require('config.php');
require('functions.php');

if(isset($_POST['submit'])){
	$uname = mysqli_real_escape_string($link, $_POST['uname']);
	$pass = mysqli_real_escape_string($link, $_POST['pass']);
	$pass = md5($pass);
	
	$sql = mysqli_query($link,"SELECT * FROM `Users` WHERE `username` = '$uname' AND `password` = '$pass'");
	$idcheck = mysqli_query($link,"SELECT `staff_id` FROM `Staff` WHERE `username` = '$uname'");
	//$id = mysqli_fetch_array($idcheck);
	$id = mysqli_result($idcheck, 0);
	
		if (mysqli_num_rows($sql) > 0) {
			//echo "You are now logged in.";
			$_SESSION['uname']=$uname;
				if (mysqli_num_rows($idcheck) > 0){
					$_SESSION['id']=$id;
				}
			header('Location: gta.php');
			exit();
		}else{
			echo "Incorrect user/password.";
		}
	
	}else{

		$form = <<<EOT
		<form action="login.php" method="POST">
		Username: <input type="text" name="uname" /><br />
		Password: <input type="password" name="pass" /><br />
		<input type="submit" name="submit" value="Log in" />
		</form>
		
		Need an account? Register <a href="register.php">here</a>.
EOT;
			
		echo $form;
}



?>