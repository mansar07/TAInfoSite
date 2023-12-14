<!--
    Programmer Name: Muhammad Ansari
    Description:  This file gets the TA info
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

	<h2>Here is The Information About The Selected TA</h2>
	<hr>

	<?php

	if (isset($_POST['ta'])) {  // If the form is selected
   		$selectedTa = $_POST['ta'];
   		$query = "SELECT * FROM ta WHERE tauserid = '" . $selectedTa . "'";
   		$result = mysqli_query($connection, $query);

   		$query2 = "SELECT loves.lcoursenum AS lovedCourse FROM loves WHERE loves.ltauserid = '$selectedTa'";
   		$result2 = mysqli_query($connection, $query2);

   		$query3 = "SELECT hates.hcoursenum AS hatedCourse FROM hates WHERE hates.htauserid = '$selectedTa'";
   		$result3 = mysqli_query($connection, $query3);

   		if ($row = mysqli_fetch_assoc($result)) {  // Getting names 
      			echo "<b>First Name: </b> " . $row["firstname"] . "<br>" . "<b>Last Name: </b>" . $row["lastname"] . "<br>" . "<b>TA UserID: </b>" . $row["tauserid"] . "<br>" . "<b>Student No: </b>" . $row["studentnum"] . "<br>" . "<b>Degree Type: </b>" . $row["degreetype"] . "<br>" . "</li>" . "<br>"; 
      			echo "<br>";

      			if ($row["image"] == NULL) {  // Adding default image
         			echo '<img src="images/faceicon.jpg" height="100" width="100">';
      			}

      			else {
         			echo '<img src="' . $row["image"] . '" height="100" width="100">';
      			}
   		}

		else {
      			echo "No Information Found On the Selected TA";
   		}
   		mysqli_free_result($result);

   		echo "<h4>Courses TA Loves (If the field is empty, the TA does not love any course)</h4>";
   		while ($row = mysqli_fetch_assoc($result2)) {  // Loves field
      			echo $row["lovedCourse"] . "<br>";
   		}
   		mysqli_free_result($result2);

   		echo "<h4>Courses TA Hates (If the field is empty, the TA does not hate any course)</h4>";
   		while ($row = mysqli_fetch_assoc($result3)) {  // Hates field
      			echo $row["hatedCourse"] . "<br>";
   		}
   		mysqli_free_result($result3);
	}

	else {
   		echo "No TA Selected";
	}
	mysqli_close($connection);
	?>
 	</body>
</html>
