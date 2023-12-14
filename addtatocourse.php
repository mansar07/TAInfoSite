<!--
    Programmer Name: Muhammad Ansari
    Description:  This file adds a ta to a course offering
-->

<!DOCTYPE html>
<html>
	<head>
      	<title>TA Information | Modify</title>
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
	include 'connectdb.php'
	?>

	<h1>Teaching Assistant Information Site</h1>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
   		$tauserID = $_POST['ta'];
   		$courseofferingID = $_POST['courseoffering'];
   		$hours = $_POST['hours'];

   		$query = "SELECT * FROM hasworkedon WHERE tauserid = '$tauserID' AND coid = '$courseofferingID'"; 
   		$result = mysqli_query($connection, $query);

   		if (!$result) {
      			die("Database Query Failed");
   		}

   		if (mysqli_num_rows($result) > 0) {
      			die("<h4>Error: TA is Already Assigned To This Course Offering!</h4>");
   		}

   		else {
      			$query2 = 'INSERT INTO hasworkedon (tauserid, coid, hours) VALUES ("' . $tauserID . '", "' . $courseofferingID . '", "' . $hours . '")';
      			$result2 = mysqli_query($connection, $query2);

      			if (!$result2) {
         			die("Failed To Assign TA To Course: " . mysqli_error($connection));
      			}

      			if (mysqli_affected_rows($connection) > 0) {
         			echo "<h4>TA Assigned To Course!</h4>";
      			}

			else {
         			echo "Failed To Assign TA To Course";
      			}
   		}
	}
	mysqli_close($connection);
	?>
	</body>
</html>
