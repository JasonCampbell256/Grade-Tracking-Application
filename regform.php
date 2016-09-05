<!-- This is a poorly named file.
More appropriate name would be regsql.php
-->
<?php
require('config.php');
require('functions.php');
session_start();

if(isset($_POST['submit'])){
	//Verifying email and passwords match
	$email1 = $_POST['email1'];
	$email2 = $_POST['email2'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	
	if($email1 == $email2){
		if($pass1 == $pass2){
			//Email and passwords match

			//Set variables to post values later
			$name = mysqli_real_escape_string($link, $_POST['name']);
			$lname = mysqli_real_escape_string($link, $_POST['lname']);
			$uname = mysqli_real_escape_string($link, $_POST['uname']);
			$email = mysqli_real_escape_string($link, $_POST['email1']);
			$pass1 = mysqli_real_escape_string($link, $_POST['pass1']);
			//Encrypt the password
			$pass1 = md5($pass1);
			
			
			unameCheck($uname);
			emailCheck($email);
			
			
			//$sql = "INSERT INTO test (input1) VALUES ('$value')";
			
			//Send values to database
			mysqli_query($link, "INSERT INTO `Users` (fname, lname, username, email, password) VALUES ('$name', '$lname', '$uname', '$email', '$pass1') ") or die(mysqli_error($link));
			$_SESSION['uname']=$uname;
			
			
			header("Refresh:3; URL=gta.php");
			echo "Registration successful ".$_SESSION['uname']."! Redirecting to login page in 3 seconds. <br />";
			
			
			}else{
				echo "Sorry, your passwords do not match. <br />";
				exit();
			}
	}else{
		echo "Sorry, the email addresses you entered do not match.<br /><br />";
	}
	
	

}


?>




