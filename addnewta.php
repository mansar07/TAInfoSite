<!--
    Programmer Name: Muhammad Ansari
    Description:  This file adds a TA to the database
-->

<!DOCTYPE html>
<html>
	<head>
      	<title>TA Information | Info</title>
      	<link rel="stylesheet" type="text/css" href="layout1.css">
      	<style type="text/css">
        	body {
            		background-color: #F2F2F2;
            		color: #666666;
            		font-family: Arial, sans-serif;
            		margin: 0;
            		padding: 0;
         	}

         	p {
            		font-size: 18px;
         	}
      	</style>
   	</head>

	<body>

	<?php
		include 'connectdb.php';
	?>

       	<h1>Teaching Assistant Information Site</h1>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {  // if the form is accessed
   		$firstName = $_POST['firstname'];
   		$lastName = $_POST['lastname'];
   		$tauserID = $_POST['tauserid'];
   		$studentNum = $_POST['studentnum'];
   		$degreeType = $_POST['degreetype'];

		$query2 = "SELECT * FROM ta WHERE studentnum = '$studentNum'";
		$result2 = mysqli_query($connection, $query2);

		if (mysqli_num_rows($result2) > 0) {
			die("<h4>Error: Student Number Already In Use!</h4>");
		}

   		$query =  'INSERT INTO ta (tauserid, firstname, lastname, studentnum, degreetype) values("' . $tauserID . '","' . $firstName . '","' . $lastName . '","' . $studentNum . '","' . $degreeType . '")';

		if (!mysqli_query($connection, $query)) {
      			die("Error Insert Failed: " . mysqli_error($connection));
   		}

		// Loop through the courseLoved Array and get the results
   		if (isset($_POST['courseLoved'])) {
      			foreach ($_POST['courseLoved'] as $courseLoved) {
         			$query2 = 'INSERT INTO loves (ltauserid, lcoursenum) VALUES ("' . $tauserID . '", "' . $courseLoved . '")';
         			$result2 = mysqli_query($connection, $query2);

				if (!$result2) {
            				die("Error Insert Failed: ". mysqli_error($connection));
         			}
      			}
   		}

		// Same thing but for hated courses
   		if (isset($_POST['courseHated'])) {
      			foreach ($_POST['courseHated'] as $courseHated) {
         			$query3 = 'INSERT INTO hates (htauserid, hcoursenum) VALUES ("' . $tauserID . '", "' . $courseHated . '")';
         			$result3 = mysqli_query($connection, $query3);

				if (!$result3) {
            				die("Error Insert Failed: " . mysqli_error($connection));
         			}
      			}
   		}
   		echo "<h3>TA Was Added!</h3>";
	}
	mysqli_close($connection);
	?>

 </body>
</html>

