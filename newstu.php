<?php
	require('functions.php');
	adminCheck();
	authHead();
?>
<html>
	<head>
		<title>New Student - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		
		
		
		<form method="POST">
			First Name: <input type = "text" name="fname" /> <br />
			Middle Name: <input type="text" name="mname" /> <br />
			Last Name: <input type = "text" name="lname" /> <br />
			Address Line 1: <input type = "text" name="add1" /> <br />
			Address Line 2: <input type = "text" name="add2" /> <br />
			City: <input type = "text" name="city" /> <br />
			State: <input type="text" name="state" /> <br />
			ZIP Code: <input type="text" name="zip" /> <br />
			Phone: <input type="text" name="phone" /> <br />
			Date of Birth: <input type="text" name="dob" /> <br />
			Gender: <input type="text" name="gender" /> <br />
	
			<input type="submit" value="Register" name="submit" />
			</form>
			
			<?php
			$fname = mysql_escape_string($_POST['fname']);
			$mname = mysql_escape_string($_POST['mname']);
			$lname = mysql_escape_string($_POST['lname']);
			$add1 = mysql_escape_string($_POST['add1']);
			$add2 = mysql_escape_string($_POST['add2']);
			$city = mysql_escape_string($_POST['city']);
			$state = mysql_escape_string($_POST['state']);
			$zip = mysql_escape_string($_POST['zip']);
			$phone = mysql_escape_string($_POST['phone']);
			$dob = mysql_escape_string($_POST['dob']);
			$gender = mysql_escape_string($_POST['gender']);
			
			if(isset($_POST['submit'])){
					
					mysql_query("INSERT INTO `Students` (`first_name`, `middle_name`, `last_name`, `address_line1`, `address_line2`, `city`, `state`, `zip`, `phone`, `dob`, `gender`) 
					VALUES ('$fname', '$mname', '$lname', '$add1', '$add2', '$city', '$state', '$zip', '$phone', '$dob', '$gender')") or die(mysql_error());
					
					header('Location: gta.php');
			}
			
			?>
			
				
				
			
		
		
	</body>
</html>