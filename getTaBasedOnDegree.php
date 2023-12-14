<!--
    Programmer Name: Muhammad Ansari
    Description:  This file gets the data based on the degree selected
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

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {  // If the user picks this form
   		$degreeType = $_POST["order"];

   		if ($degreeType == "Masters") {  // if the degree picked is masters
      			$query = "SELECT * FROM ta WHERE degreetype LIKE 'M%'";
      			$result = mysqli_query($connection, $query);

      			if (!$result) {
         			die ("Database Query Failed");
      			}

      			echo "<h3>Information of TA's With Master's Degree</h3>";
      			echo "<ol>";

      			while ($row = mysqli_fetch_assoc($result)) {  // loop through the query and print the required info
         			echo "<li>";
         			echo "<b>First Name: </b> " . $row["firstname"] . ", " . "<b>Last Name: </b>" . $row["lastname"] . ", " . "<b>TA UserID: </b>" . $row["tauserid"] . ", " . "<b>Student No: </b>" . 	$row["studentnum"] . ", " . "<b>Degree Type: </b>" . $row["degreetype"] . "</li>";
         			echo "<hr>";
      			}
      			mysqli_free_result($result);
      			echo "</ol>";
   		}

   		else if ($degreeType == "PhD") {
      			$query = "SELECT * FROM ta WHERE degreetype LIKE 'P%'";
      			$result = mysqli_query($connection, $query);

      			if (!$result) {
         			die ("Database Query Failed");
      			}

      			echo "<h3>Information of TA's With PhD Degree</h3>";
      			echo "<ol>";

      			while ($row = mysqli_fetch_assoc($result)) {
         			echo "<li>";
         			echo "<b>First Name: </b> " . $row["firstname"] . ", " . "<b>Last Name: </b>" . $row["lastname"] . ", " . "<b>TA UserID: </b>" . $row["tauserid"] . ", " . "<b>Student No: </b>" . 	$row["studentnum"] . ", " . "<b>Degree Type: </b>" . $row["degreetype"] . "</li>";
         			echo "<hr>";
     	 		}
      			mysqli_free_result($result);
      			echo "</ol>";
   		}
	}

   	else {
      		echo "Error, Please Try Again!";
   	}
	mysqli_close($connection);
	?>

 	</body>
</html>
