<?php

require('config.php');
require('functions.php');
session_start();

if(isset($_POST['submit'])){
	$subject = mysql_escape_string($_POST['subject']);
	$term = mysql_escape_string($_POST['term']);
	$year = mysql_escape_string($_POST['year']);
	$staffid = mysql_escape_string($_SESSION['id']);

	mysql_query("INSERT INTO `Classes` (subject, class_id, term, year, staff_id) VALUES ('$subject', NULL, '$term', '$year', '$staffid') ") or die(mysql_error());
	header('Location: viewclass.php');
	}
?>