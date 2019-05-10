<?php

session_start();
$servername ="localhost";
$user_name="root";
$password="";
$db= "exam_portal";

//$_SESSION["arr"]= array(2,2,2,2,0,0,0,0,0,0);

//$flag=0;

$conn = mysqli_connect($servername,$user_name,$password,$db);

if(!$conn)
	die("Connection Failed".mysqli_connect_error());
else
	echo "Connection Successful"."<br>";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$mail= $_SESSION["mail_id"];
	$sql = "SELECT * FROM Student WHERE Email='$mail'";
	$result = mysqli_query($conn,$sql);

	if($result)
	echo "Query Successful";
	else 
	echo "Not Successful";
	
	$result = mysqli_fetch_assoc($result);
	$roll = $result["RollNo"];
	$marx = $_SESSION["correct_ans"];
	$today = date("d-m-Y h:i:s A");
	$sql = "INSERT INTO History(Email,RollNo,Marks,Date_Time)
			VALUES('$mail','$roll','$marx','$today') ";
	if(mysqli_query($conn,$sql))
	echo "Query Successful";
	else 
	echo "Not Successful";
}

/*$sql = "CREATE TABLE History(
		Email VARCHAR(50) NOT NULL,
		RollNo VARCHAR(50) NOT NULL PRIMARY KEY,
		Marks decimal(2) NOT NULL,
		Date_Time VARCHAR(50) )"; */
/*if(mysqli_query($conn,$sql))
	echo "Query Successful";
else 
	echo "Not Successful";
*/
/*
<!DOCTYPE HTML>
<html>
<body>
	<form method="post" action="bye.php">
    <input type="submit" name="logout" value="Done"><br>
</body>
</html>
*/
?>

<!DOCTYPE HTML>
<html>
	<script>
		localStorage.clear();
	</script>
</html>

<?php

session_unset();
session_destroy();

header("Location:sign_in.php");
exit;

?>