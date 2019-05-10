<?php

session_start();

$servername ="localhost";
$user_name="root";
$password="";
$db= "exam_portal";

$conn = mysqli_connect($servername,$user_name,$password,$db);

if(!$conn)
	die("Connection Failed".mysqli_connect_error());
else
	echo "Connection Successful"."<br>";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name= $_POST["name"];
	$roll= $_POST["roll"];
	$email= $_POST['email'];
	$branch= $_POST['branch'];
	$college=$_POST['college'];
	$cgpa = $_POST['cgpa'];
	$passwd= $_POST["passwd"];

	$sql = "SELECT * FROM Student
			WHERE RollNo = '$roll'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "You have already registered";
		$_SESSION["already"]=1;
		header("Location:sign_in.php");
		exit;
	}
	else {
	$sql = "INSERT INTO Student(Name,RollNo,Email,Branch,College,CGPA,Password)
			VALUES ('$name','$roll','$email','$branch','$college',$cgpa,'$passwd')";
	$result =mysqli_query($conn,$sql);
	if($result)
	{	echo "Query Successful";
		$_SESSION["flag"]=1;
		header("Location:sign_in.php");
		exit;
	}
	else
		echo "Not Successful";
	}
}

?>