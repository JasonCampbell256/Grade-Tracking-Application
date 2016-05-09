<?php 
session_start();

function adminCheck(){
	$id = $_SESSION['id'];
	if($id != "5221"){
		header('Location: gta.php?adminerr');
		echo "You do not have permission to view this page! Ask your database manager for authorization.<p>";
	}
}

function authHead(){
	session_start();
	require('config.php');
	authTest();
	include("banner.php");
}

function authTest(){
	if(isset($_SESSION['id'])){
		return true;
	}else{
		header('Location: gta.php');
		echo "You do not have permission to view this page! Ask your database manager for authorization.<p>";
	}
}



//Checks to see if account is authorized
function auth(){
	if(isset($_SESSION['id'])){
		return true;
	}
}



//Echos error message if user is not authorized
function notAuth(){
	echo "You do not have permission to view this page! Ask your database manager for authorization.<p>";
		
}

//Returns user's first name
function firstName(){
	$uname = $_SESSION['uname'];	
	$sql =  mysql_query("SELECT `fname` FROM `Users` WHERE `username` = '$uname'");
	$fname = mysql_fetch_object($sql);
	$fname = $fname->fname;
	return $fname;
}


//Makes sure the user is not trying to use an existing username
function unameCheck($uname){
		$check = mysql_query("SELECT * FROM users WHERE uname = '$uname'");
			if(mysql_num_rows($check) > 0){
				echo "Sorry, that username is taken.";
				exit();
			}
}


//Makes sure the user is not trying to use an existing email
function emailCheck($email){
		$check = mysql_query("SELECT * FROM users WHERE email = '$email'");
			if(mysql_num_rows($check) > 0){
				echo "Sorry, that email address is taken.";
				exit();
			}
}

?>