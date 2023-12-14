<!--
    Programmer Name: Muhammad Ansari
    Description:  This file gets all ta info
-->

<?php

$query = "SELECT * FROM ta";
$result = mysqli_query($connection, $query);

if (!$result) {
   die("Database query failed");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<li>";
   echo "<b>First Name:</b> " . $row["firstname"] . ", " . "<b>Last Name:</b> " . $row["lastname"] . ", " . "<b>TA UserID:</b> " . $row["tauserid"] . ", " . " " . "<b>Student No:</b> " . $row["studentnum"] . ", " . "<b>Degree Type:</b> " . $row["degreetype"] . "</li>";
   echo "<hr>";
}
mysqli_free_result($result);
echo "</ol>";

?>
