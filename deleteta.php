<!--
    Programmer Name: Muhammad Ansari
    Description:  This file deletes the TA from the database
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
	include 'connectdb.php';
	?>

	<h1>Teaching Assistant Information Site</h1>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Check if the form is accessed
   		$tauserID = $_POST['ta'];
   		$query = "DELETE FROM ta WHERE tauserid = '$tauserID'";
   		$result = mysqli_query($connection, $query);

   		if (!$result) {
      			die("Delete Failed: " . mysqli_error($connection));
   		}
   		echo "<h4>TA Deleted!</h4>";
	}

	else {
   		echo "<h4>Error: TA Could Not Be Deleted!</h4>";
	}
	mysqli_close($connection);
	?>
  	</body>
</html>
