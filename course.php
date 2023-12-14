<!--
    Programmer Name: Muhammad Ansari
    Description:  This file hosts everything related to courses
-->

<!DOCTYPE html>
<html>
	<head>
      	<title>TA Information | Courses</title>
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

		input[type='file'] {
    			background-color: #f0f0f0;
    			color: #003366;
    			border: 1px solid #003366;
    			padding: 5px;
   	 		border-radius: 4px;
    			margin: 5px 0;
    			width: 80%;
    			cursor: pointer;
    			display: inline-block;
    			text-align: left;
    			font-size: 16px;
   	 		box-sizing: border-box;
		}

		input[type='file']:hover {
    			background-color: #e0e0e0;
		}

		input[type='text'], input[type='number'] {
    			background-color: #f0f0f0;
   	 		color: #003366;
    			border: 1px solid #003366;
    			padding: 8px 10px;
   	 		border-radius: 4px;
    			margin: 5px 0;
    			width: 50%;
    			box-sizing: border-box;
    			font-size: 16px;
   	 		transition: border-color 0.3s;
			display: block;
		}

		input[type='text']:focus, input[type='number']:focus {
    			border-color: #ff9933;
    			outline: none;
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

      		<h2>Courses</h2>
      		<hr>

		<form action = "getcourseoffering.php" method = "post">
   		<h3>Pick A Course To View The Course Offerings</h3>
   		<label for = "course">Select A Course:</label>
   		<select name = "course" id = "course">

		<?php
      		$query = "SELECT coursenum FROM course";
      		$result = mysqli_query($connection, $query);
      		if (!$result) {
         		die("Database Query Failed");
      		}
      		while ($row = mysqli_fetch_assoc($result)) {
         		echo "<option value='" . $row['coursenum'] . "'>" . $row['coursenum'] . "</option>";
      		}
   		?>
   		</select><br>

   		<label for = "startyear">Start Year:</label>
   		<input type = "number" name = "startyear" id = "startyear"><br>

   		<label for = "endyear">End Year:</label>
   		<input type = "number" name = "endyear" id = "endyear"><br>

   		<input type = "submit" value = "Show Course Offerings">
		</form>
		<br>
		<br>

		<form action = "getTAcourseoffering.php" method = "post">
   		<h3>Pick A TA And View Their Courses</h3>
   		<label for = "ta">Select a TA:</label>
   		<select name = "ta" id = "ta">
   		<?php
   		$query = "SELECT tauserid, firstname, lastname FROM ta";
   		$result = mysqli_query($connection, $query);

   		if (!$result) {
      			die("Database Query Failed");
   		}

   		while ($row = mysqli_fetch_assoc($result)) {
      			echo "<option value='" . $row['tauserid'] . "'>" . $row['tauserid'] . ", " . $row['firstname'] . " " . $row['lastname'] . "</option>";
   		}
   		?>
   		</select><br>
   		<input type = "submit" value = "View Courses">
		</form>
		<br>

		<form action = "getcourseofferdetails.php" method = "post">
   		<h3>View Course Offering Details</h3>
   		<label for = "courseoffering">Select Course Offering:</label>
   		<select name = "courseoffering" id = "courseoffering">

   		<?php
   		$query = "SELECT coid, whichcourse FROM courseoffer";
   		$result = mysqli_query($connection, $query);

   		if (!$result) {
      			die("Database Query Failed");
   		}

   		while ($row = mysqli_fetch_assoc($result)) {
      			echo "<option value='" . $row['coid'] . "'>" . $row['whichcourse'] . " " . "(" . $row['coid'] . ")" . "</option>";
   		}
   		?>

   		</select><br>
   		<input type = "submit" value = "View Course Offering Details">
		</form>
	</body>
</html>
