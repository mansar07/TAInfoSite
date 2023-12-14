<!--
    Programmer Name: Muhammad Ansari
    Description:  This file sorts the ta's based on degrees
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
      	<h1>Teaching Assistant Information Site</h1>

	<?php
	include 'connectdb.php';
	?>

      	<h3>Here is the Sorted Data By Degree Type</h3>

	<?php
	// Order them based on degree
	if (isset($_POST["degree"])) {
   		$query = "SELECT * FROM ta ORDER BY degreetype";
   		$result = mysqli_query($connection, $query);

   		if (!$result) {
      			die("Database Query Failed");
   		}
   		echo "<ol>";
   		while ($row = mysqli_fetch_assoc($result)) {
 			echo "<li>";
			echo "<b>First Name: </b> " . $row["firstname"] . ", " . "<b>Last Name: </b>" . $row["lastname"] . ", " . "<b>TA UserID: </b>" . $row["tauserid"] . ", " . "<b>Student No: </b>" . $row["studentnum"] . ", " . "<b>Degree Type: </b>" . $row["degreetype"] . "</li>";
      			echo "<hr>";
   		}
   		mysqli_free_result($result);
   		echo "</ol>";
	}
	mysqli_close($connection);
	?>
   	</body>
</html>
