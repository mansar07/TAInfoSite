<!--
    Programmer Name: Muhammad Ansari
    Description:  This file sorts TA's by lastname based on ascending or descending
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

	<h2>Here Is the Sorted Data By Last Name</h2>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Acess if clicked on this form
   		$sortOrder = $_POST["order"];

   		if ($sortOrder == "ASC") {  // if the user picks ascending order
      			$query = "SELECT * FROM ta ORDER BY lastname ASC";
      			$result = mysqli_query($connection, $query);

      			if (!$result) {
         			die("Database Query Failed");
      			}
      			echo "<h3>Sorted By Ascending Order</h3>";
      			echo "<ol>";

			while ($row = mysqli_fetch_assoc($result)) {
         		echo "<li>";
         		echo "<b>First Name: </b> " . $row["firstname"] . ", " . "<b>Last Name: </b>" . $row["lastname"] . ", " . "<b>TA UserID: </b>" . $row["tauserid"] . ", " . "<b>Student No: </b>" . $row["studentnum"] . ", " . "<b>Degree Type: </b>" . $row["degreetype"] . "</li>";
         		echo "<hr>";
      			}
   			mysqli_free_result($result);
   			echo "</ol>"; 
   		}

   		else if ($sortOrder == "DESC") {  // if the user picks descending order
   			$query = "SELECT * FROM ta ORDER BY lastname DESC";
   			$result = mysqli_query($connection, $query);

  	 		if (!$result) {
      				die("Database Query Failed");
   			}
   			echo "<h3>Sorted By Descending Order</h3>";
   			echo "<ol>";

			while ($row = mysqli_fetch_assoc($result)) {
      				echo "<li>";
      				echo "<b>First Name: </b> " . $row["firstname"] . ", " . "<b>Last Name: </b>" . $row["lastname"] . ", " . "<b>TA UserID: </b>" . $row["tauserid"] . ", " . "<b>Student No: </b>" . $row["studentnum"] . ", " . "<b>Degree Type: </b>" . $row["degreetype"] . "</li>";
      				echo "<hr>";
   			}
   			mysqli_free_result($result);
   			echo "</ol>";
   		}
	}
	mysqli_close($connection);
	?>
   	</body>
</html>

