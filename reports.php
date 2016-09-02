<?php
	require('functions.php');
    require('config.php');
	authHead();
?>
<html>
	<head>
		<title>Class Averages - Grade Tracking Application</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
		
	<body>
		<?php
			$classID  = $_GET['classID'];?> 
        
        
        
        <?php
            //Query student IDs for class
            $result = mysqli_query($link, "SELECT `student_id` FROM `Roster` WHERE `class_id` = '$classID'");
            while( $row = mysqli_fetch_assoc( $result)){
                $new_array[] = $row["student_id"]; // Inside while loop
            }	
            $studentsArray = implode(",", $new_array);
            //Query names for student IDs
            $namesResult = mysqli_query($link, "SELECT * FROM `Students` WHERE `student_id` IN($studentsArray)");
            while( $namesRow = mysqli_fetch_assoc($namesResult)){
                $name = $namesRow["first_name"]." ".$namesRow["last_name"];
                $id = $namesRow["student_id"];
                //Create an associative array for names and ids
                $namesArray[$id] = $name;
                }
            
            //Query assignment types for class, associate percentages
            $assignTypeResult = mysqli_query($link, "SELECT * FROM `Assignment_Types` WHERE `class_id` = '$classID'");
            while( $assignRow = mysqli_fetch_assoc($assignTypeResult)){
                $assignType = $assignRow["type_id"];
                $perc = $assignRow["percentage"];
                //Create an associative array for type percentages
                $assignAssignTypePercArray[$assignType] = intval($perc);
            }
            
            //Associate assignments with percentages
            $result = mysqli_query($link, "SELECT * FROM `Assignments` WHERE `class_id` = '$classID'");
            while($row = mysqli_fetch_assoc($result)){
                $type = $row["type"];
                $id = $row["assignment_id"];
                $assignTypeArray[$id] = $assignAssignTypePercArray[$type];
            }
            
            print_r($namesArray);
            
            //Create the imploded array and use it in the following SQL:
            //$result = mysqli_query($link, "SELECT * FROM `Score` WHERE `assignment_id` = 'INSERT IMPLODED ARRAY");
            foreach ($namesArray as $sID => $sName){
                //echo "test1";
                $average = 0;
                foreach ($assignTypeArray as $aID => $perc){
                    //echo "test2";
                    $result =  mysqli_query($link, "SELECT * FROM `Scores` WHERE `student_id` = '$aID' AND `assignment_id` = '$aID'");
                    while( $row = mysqli_fetch_assoc($result)){
                        $aScore = intval($row["score"]) * .01;
                        echo $aScore;
                        //$average = $average + ()
                    }
                }
            } 
        ?>	
	</body>
</html>