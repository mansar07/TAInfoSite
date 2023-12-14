<!--
    Programmer Name: Muhammad Ansari
    Description:  This file gets course offerings for selected couse based on start and end year
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
	<h2>Course Offering's Of Selected Course</h3>
	<hr>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
   		$chosenCourse = $_POST['course'];
   		$startyear = $_POST['startyear'];
   		$endyear = $_POST['endyear'];

   		$query = "SELECT coid, numstudent, term, year FROM courseoffer WHERE whichcourse = '$chosenCourse' AND year BETWEEN '$startyear' AND '$endyear'";
   		$result = mysqli_query($connection, $query);

   		if (!$result) {
      			die("Database Query Failed");
   		}

		if ($startyear > $endyear) {  // If the start year is greater than end year then print an error message
			die("<h4>Error: Starting Year Cannot be Greater Than Ending Year, Please Try Again With The Correct Values</h4>");
		}

   		while ($row = mysqli_fetch_assoc($result)) {  // Loop through the select query and output the values below
      			echo "<b>Course offering ID:</b> " . $row['coid'] . "<br>";
      			echo "<b>Number of Students:</b> " . $row['numstudent'] . "<br>";
      			echo "<b>Term:</b> " . $row['term'] . "<br>";
      			echo "<b>Year:</b> " . $row['year'] . "<br>";
      			echo "<br>";
   		}
   		mysqli_free_result($result);
	}
	mysqli_close($connection);
	?>
	</body>
</html>
