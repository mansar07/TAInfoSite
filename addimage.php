<!--
    Programmer Name: Muhammad Ansari
    Description:  This file modifys the image url of the ta's
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
	include 'upload_file.php';
	include 'connectdb.php';
	?>

      	<h1>Teaching Assistant Information Site</h1>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {  // If the user picks this form
   		$tauserID = $_POST['ta'];
   		$query = "UPDATE ta SET image = '$taImage' WHERE tauserid = '$tauserID'";  //Assign the new image url 
   		$result = mysqli_query($connection, $query);

   		if (!$result) {
      			die("Inserting Image Failed: " . mysqli_error($connection));
   		}

		else {
      			echo "<h4>Inserting Image Successfull</h4>";
   		}
	}

	else {
   		echo "No Data Submitted";
	}
	?>
	</body>
</html>

