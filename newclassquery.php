<?php

require('config.php');
require('functions.php');
session_start();

if(isset($_POST['submit'])){
	$subject = mysqli_real_escape_string($link, $_POST['subject']);
	$term = mysqli_real_escape_string($link, $_POST['term']);
	$year = mysqli_real_escape_string($link, $_POST['year']);
	$staffid = mysqli_real_escape_string($link, $_SESSION['id']);

	mysqli_query($link,"INSERT INTO `Classes` (subject, class_id, term, year, staff_id) VALUES ('$subject', NULL, '$term', '$year', '$staffid') ") or die(mysql_error());
	header('Location: viewclass.php');
	}
?>