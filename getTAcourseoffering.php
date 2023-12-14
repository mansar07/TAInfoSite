<!--
    Programmer Name: Muhammad Ansari
    Description:  This file gets the TA courseofferings
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
            		padding: 20px;
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
	<h2>Course Offerings Worked On By The Selected TA</h2>
	<hr>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Access if the user picks this form
   			$chosenTa = $_POST['ta'];
   			$query = "SELECT c.coursenum, c.coursename, co.term, co.year, hw.hours, CASE WHEN l.lcoursenum IS NOT NULL THEN 'Loved' WHEN h.hcoursenum IS NOT NULL THEN 'Hated' ELSE 'Neutral' END AS coursePreference FROM hasworkedon hw JOIN ta ON hw.tauserid = ta.tauserid JOIN courseoffer co ON hw.coid = co.coid JOIN course c ON co.whichcourse = c.coursenum LEFT JOIN loves l ON ta.tauserid = l.ltauserid AND l.lcoursenum = c.coursenum LEFT JOIN hates h ON ta.tauserid = h.htauserid AND h.hcoursenum = c.coursenum WHERE ta.tauserid = '$chosenTa'";
   			$result = mysqli_query($connection, $query);

   			if (!$result) {
      				die("Database Query Failed");
   			}

			echo "<h3>If the field is empty, The Selected TA Has Not Worked On Any Course Offerings</h3><br>";
   			while ($row = mysqli_fetch_assoc($result)) {  // Display the courseofferings of TA
        			echo "<b>Course Number:</b> " . $row['coursenum'] . "<br>";
        			echo "<b>Course Name:</b> " . $row['coursename'] . "<br>";
        			echo "<b>Term:</b> " . $row['term'] . "<br>";
        			echo "<b>Year:</b> " . $row['year'] . "<br>";
        			echo "<b>Hours:</b> " . $row['hours'] . "<br>";
        			echo "<br>";

  				if ($row['coursePreference'] == 'Loved') {  // If the TA loves the course then add a happy face
        				echo '<img src="images/happyface.jpg" alt="Loved" height="100" width="100"><br>';
    				}

				elseif ($row['coursePreference'] == 'Hated') {  // If hates then add a sad face
        				echo '<img src="images/sadface.jpeg" alt="Hated" height="100" width="100"><br>';
    				}
				echo "<hr>";
   			}
   			mysqli_free_result($result);
		}
		mysqli_close($connection);
	?>
 	</body>
</html>
