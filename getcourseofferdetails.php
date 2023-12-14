<!--
    Programmer Name: Muhammad Ansari
    Description:  This file gets course offering details
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
	<h2>Course Offering Details Of The Selected Course Offering</h2>
	<hr>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {  // if the form is clicked
   		$selectedcourseoffer = $_POST['courseoffering'];
   		$query = "SELECT co.coid, c.coursenum, c.coursename, ta.tauserid, ta.firstname, ta.lastname FROM courseoffer co JOIN course c ON co.whichcourse = c.coursenum JOIN hasworkedon hw ON co.coid = hw.coid JOIN ta ON hw.tauserid = ta.tauserid WHERE co.coid = '$selectedcourseoffer'";
   		$query2 = "SELECT c.coursenum, c.coursename FROM course c JOIN courseoffer co ON c.coursenum = co.whichcourse WHERE co.coid = '$selectedcourseoffer'";
   		$result = mysqli_query($connection, $query);
   		$result2 = mysqli_query($connection, $query2);

   		if (!$result) {
      			die("Database Query Failed");
   		}

   		if (!$result2) {
      			die("Database Query Failed");
   		}

   		echo "<h4>Course Code and Name of The Selected Course Offering</h4>";
   		while ($row = mysqli_fetch_assoc($result2)) {  // get the course code and name
      			echo "<b>Course Code:</b> " . $row['coursenum'] . "<br>";
      			echo "<b>Course Name:</b> " . $row['coursename'] . "<br>";
   		}
   		mysqli_free_result($result2);

   		echo "<h4>TA's Who Worked On The Selected Course Offering (If Empty, then No TA Worked On The Selected Course Offering)</h4>";
   		while ($row = mysqli_fetch_assoc($result)) {  // get the ta's who've worked on the course
      			echo "<b>TA User ID:</b> " . $row['tauserid'] . "<br>";
      			echo "<b>TA Name:</b> " . $row['firstname'] . " " . $row['lastname'] . "<br><br>";
   		}
   		mysqli_free_result($result);
	}
	mysqli_close($connection)
	?>
	</body>
</html>
