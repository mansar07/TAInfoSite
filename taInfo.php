<!--
   Programmer Name: Muhammad Ansari
    Description:  This file is the main hub of information about TA's
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
			text-align: left;
         	}

         	p {
            		font-size: 18px;
         	}

		input[type='submit'], button {
    			background-color: #003366;
    			color: white;
    			border: none;
    			padding: 15px 30px;
    			border-radius: 5px;
    			font-weight: bold;
    			cursor: pointer;
    			transition: background-color 0.3s;
                        font-size: 18px;
                        display: inline-block;
                        margin: 10px 0;
                        width: fit-content;
		}

		input[type='submit']:hover, button:hover {
    			background-color: #ff9933;
		}

		input[type='radio'] {
    			margin-right: 5px;
		}

		input[type='radio'] + label {
    			color: #666666;
    			margin-right: 20px;
		}

		select {
    			background-color: #f0f0f0;
    			color: #003366;
   	 		border: 1px solid #003366;
    			padding: 5px;
    			border-radius: 4px;
    			margin: 5px 0;
    			width: 50%;
    			box-sizing: border-box;
    			cursor: pointer;
			display: block;
		}

		select:focus {
    			outline: none;
    			border-color: #ff9933;
		}

      	</style>
   	</head>

   	<body>
	<?php
	include 'connectdb.php';
	?>

       	<h1>Teaching Assistant Information Site</h1>
       	<nav>
        	<a href = "mainmenu.php" class = "nav-button">Main</a>
          	<a href = "taInfo.php" class = "nav-button">Info</a>
          	<a href = "modifyTa.php" class = "nav-button">Modify</a>
          	<a href = "course.php" class = "nav-button">Course</a>
       	</nav>

    	<h2>Teaching Assistant Information<br></h2>
    	<hr>

	<form action = "getSortedLname.php" method = "post">
   	<h3>Order By Last Name</h3>
   	<input type = "radio" id = "ascending" name = "order" value = "ASC" checked>
   	<label for = "ascending">Ascending</label>

   	<input type = "radio" id = "descending" name = "order" value = "DESC">
   	<label for = "descending">Descending</label>

	<br>
	<br>

   	<input type = "submit" value = "Sort By Last Name">
	</form>

	<form action = "getSortedByDegree.php" method = "post">
   	<br>
   	<h3>Order By Degree Type</h3>

	<br>
	<br>

   	<button type = "submit" name = "degree">Sort By Degree Type</button> 
	</form>

	<form action = "getTaInfo.php" method = "post">
   	<br>
   	<h3>Get The Information For A Specific TA</h3><br>
	<label for = "ta">Select a TA: </label>
	<select name = "ta" id = "ta">

   	<?php
   	$query = "SELECT tauserid, firstname, lastname FROM ta";
   	$result = mysqli_query($connection, $query);

	if (!$result) {
      		die ("Database Query Failed");
   	}

	// Loop through the ta's and display them in a dropdown for selection
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value = '" . $row['tauserid'] . "'>" . $row['tauserid'] . ", " . $row['firstname'] . " " . $row['lastname'] . "</option>";
   	}
   	?>
	</select><br>
	<br>

   	<input type = "submit" value = "Show TA Information">
	</form>

	<form action = "getTaBasedOnDegree.php" method = "post">
   	<br>
   	<h3>Get TA Information Based On Degree</h3>
   	<input type = "radio" id = "masters" name = "order" value = "Masters" checked>
   	<label for = "masters">Masters</label>

   	<input type = "radio" id = "phd" name = "order" value = "PhD">
   	<label for = "phd">PhD</label>

	<br>
	<br>

   	<input type = "submit" value = "Show TA Studying The Selected Degree">
	</form>

	</body>
</html>
