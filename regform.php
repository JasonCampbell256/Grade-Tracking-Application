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
			$name = mysql_escape_string($_POST['name']);
			$lname = mysql_escape_string($_POST['lname']);
			$uname = mysql_escape_string($_POST['uname']);
			$email = mysql_escape_string($_POST['email1']);
			$pass1 = mysql_escape_string($_POST['pass1']);
			//Encrypt the password
			$pass1 = md5($pass1);
			
			
			unameCheck($uname);
			emailCheck($email);
			
			
			//$sql = "INSERT INTO test (input1) VALUES ('$value')";
			
			//Send values to database
			mysql_query("INSERT INTO `Users` (fname, lname, username, email, password) VALUES ('$name', '$lname', '$uname', '$email', '$pass1') ") or die(mysql_error());
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




