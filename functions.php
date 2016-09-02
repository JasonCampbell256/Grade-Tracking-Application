<?php 
session_start();

function mysqli_result($res,$row=0,$col=0){
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

function adminCheck(){
	$id = $_SESSION['id'];
	if(!$id == "5223"){
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
	$sql =  mysqli_query($link, "SELECT `fname` FROM `Users` WHERE `username` = '$uname'");
	$fname = mysqli_fetch_object($sql);
	$fname = $fname->fname;
	return $fname;
}


//Makes sure the user is not trying to use an existing username
function unameCheck($uname){
		$check = mysqli_query($link, "SELECT * FROM users WHERE uname = '$uname'");
			if(mysqli_num_rows($check) > 0){
				echo "Sorry, that username is taken.";
				exit();
			}
}


//Makes sure the user is not trying to use an existing email
function emailCheck($email){
		$check = mysqli_query($link, "SELECT * FROM users WHERE email = '$email'");
			if(mysqli_num_rows($check) > 0){
				echo "Sorry, that email address is taken.";
				exit();
			}
}

?>