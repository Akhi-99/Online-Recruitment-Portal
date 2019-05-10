<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<h1 style="text-align:center">THANK YOU</h1>
    <br>
    <h1 style="text-align:center">You are done with the test....</h1>
    <br>
    <form method="post" action="last.php">
    <input type="submit" name="logout" class='but' value="Logout"><br>
</body>
</html>

<?php
//session_unset();
//session_destroy();
?>