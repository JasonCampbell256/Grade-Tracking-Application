<?php
	require('functions.php');
    require('config.php');
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
			$fname = mysqli_real_escape_string($link, $_POST['fname']);
			$mname = mysqli_real_escape_string($link, $_POST['mname']);
			$lname = mysqli_real_escape_string($link, $_POST['lname']);
			$add1 = mysqli_real_escape_string($link, $_POST['add1']);
			$add2 = mysqli_real_escape_string($link, $_POST['add2']);
			$city = mysqli_real_escape_string($link, $_POST['city']);
			$state = mysqli_real_escape_string($link, $_POST['state']);
			$zip = mysqli_real_escape_string($link, $_POST['zip']);
			$phone = mysqli_real_escape_string($link, $_POST['phone']);
			$dob = mysqli_real_escape_string($link, $_POST['dob']);
			$gender = mysqli_real_escape_string($link, $_POST['gender']);
			
			if(isset($_POST['submit'])){
					
					mysqli_query($link,"INSERT INTO `Students` (`first_name`, `middle_name`, `last_name`, `address_line1`, `address_line2`, `city`, `state`, `zip`, `phone`, `dob`, `gender`) 
					VALUES ('$fname', '$mname', '$lname', '$add1', '$add2', '$city', '$state', '$zip', '$phone', '$dob', '$gender')") or die(mysql_error());
					
					header('Location: gta.php');
			}
			
			?>
			
				
				
			
		
		
	</body>
</html>