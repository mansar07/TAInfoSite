<!--
    Programmer Name: Muhammad Ansari
    Description:  This file handles all the main changes made in modifying ta
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
    			width: 50%;
    			cursor: pointer;
    			display: block;
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

	<script>
	function confirmDelete() {  // Javascript function to display confirmation message
   	return confirm("Are You Sure You Want To Delete This TA?");
	}
	</script>

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

      	<h2>Modify Teaching Assistant Information</h2>
      	<hr>

	<form action = "addnewta.php" method = "post">
   	<h3>Add A New Teaching Assistant</h3><br>
   	First Name: <input type = "text" name = "firstname"><br>
   	Last Name: <input type = "text" name = "lastname"><br>
   	User ID: <input type = "text" name = "tauserid"><br>
   	Student Num: <input type = "number" name = "studentnum"><br>
   	<br>
   	<input type = "radio" name = "degreetype" value = "Masters">Masters
   	<input type = "radio" name = "degreetype" value = "PhD">PhD
   	<br>
   	<br>

	<label for = "courseLoved">Courses Loved (Press Ctrl + Click, or Command + Click For Multiple Selections):</label>
   	<select name = "courseLoved[]" id = "courseLoved" multiple>

   	<?php
   	$query = "SELECT coursenum, coursename FROM course";
   	$result = mysqli_query($connection, $query);

  	if (!$result) {
      		die("Database Query Failed");
   	}

  	while ($row = mysqli_fetch_assoc($result)) {  // Put all the courses in a list
      		echo "<option value = '" . $row['coursenum'] . "'>" . $row['coursenum'] . ", " . $row['coursename'] . "</option>";
   	}
   	?>
   	</select><br>
	<br>

   	<label for = "courseHated">Courses Hated (Press Ctrl + Click or Command + Click For Multiple Selections):</label>
   	<select name = "courseHated[]" id = "courseHated" multiple>

   	<?php
   	$query = "SELECT coursenum, coursename FROM course";
   	$result = mysqli_query($connection, $query);

   	if (!$result) {
      		die("Database Query Failed");
   	}

   	echo "<h4>";
   	while ($row = mysqli_fetch_assoc($result)) {  // Put all the courses in a list
      		echo "<option value = '" . $row['coursenum'] . "'>" . $row['coursenum'] . ", " . $row['coursename'] . "</option>";
   	}
   	?>
   	</select><br>
   	<br>

   	<input type = "submit" value = "Add TA">
	</form>

	<br>

	<form action = "deleteta.php" method = "post">
   	<h3>Delete A Teaching Assistant</h3><br>
   	<label for = "ta">Select a TA: </label>
   	<select name = "ta" id = "ta">
   	<?php
   	$query = "SELECT tauserid, firstname, lastname FROM ta";
   	$result = mysqli_query($connection, $query);

  	if (!$result) {
      		die("Database Query Failed");
   	}

   	while ($row = mysqli_fetch_assoc($result)) {  // Put all the Ta's in a list
      		echo "<option value = '" . $row['tauserid'] . "'>" . $row['tauserid'] . ", " . $row['firstname'] . " " . $row['lastname'] . "</option>";
   	}
   	?>
   	</select><br>
   	<input type = "submit" value = "Delete TA" onclick = "return confirmDelete()">
	</form>

	<br>

	<form action = "addtatocourse.php" method = "post">
	<h3>Assign TA To A Course Offering</h3><br>

	<label for = "ta">Select A TA:</label>
	<select name = "ta" id = "ta">

	<?php
  	$query = "SELECT tauserid, firstname, lastname FROM ta";
   	$result = mysqli_query($connection, $query);

   	if (!$result) {
      		die("Database Query Failed");
   	}

  	while ($row = mysqli_fetch_assoc($result)) {  // Put all the ta's in a list
      		echo "<option value = '" . $row['tauserid'] . "'>" . $row['tauserid'] . ", " . $row['firstname'] . " " . $row['lastname'] . "</option>";
   	}
	?>

	</select><br>

	<label for = "courseoffering">Select Course Offering:</label>
	<select name = "courseoffering" id = "courseoffering">

	<?php
	$query = "SELECT coid, whichcourse FROM courseoffer";
	$result = mysqli_query($connection, $query);

	if (!$result) {
   		die("Database Query Failed");
	}

	while ($row = mysqli_fetch_assoc($result)) {  // Put all the courseofferings in a list
   		echo "<option value='" . $row['coid'] . "'>" . $row['whichcourse'] . " " . "(" . $row['coid'] . ")" . "</option>";
	}
	?>
	</select><br>

	<label for = "hours">Number Of Hours Worked: </label>
	<input type = "number" name = "hours" id = "hours">
	<br>
	<input type = "submit" value = "Add TA To Course">
	</form>

	<br>
	<br>

	<form action = "addimage.php" method = "post" enctype = "multipart/form-data">
   	<h3>Modify Image Of Teaching Assistant</h3><br>
   	<label for = "ta">Select a TA</label>
   	<select name = "ta" id = "ta">
   	<?php
   	$query = "SELECT tauserid, firstname, lastname FROM ta";
  	$result = mysqli_query($connection, $query);

   	if (!$result) {
      		die("Database Query Failed");
   	}

   	while ($row = mysqli_fetch_assoc($result)) {  // Put all the ta's in a list
      		echo "<option value='" . $row['tauserid'] . "'>" . $row['tauserid'] . ", " . $row['firstname'] . " " . $row['lastname'] . "</option>";
   	}
   	?>
   	</select><br>

   	<input type = "file" name = "file" id = "file"><br>
   	<br>
   	<br>
   	<input type = "submit" value = "Add Image of TA">
	</form>

	</body>
</html>
