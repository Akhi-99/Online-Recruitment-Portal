<?php

session_start();

$_SESSION["flag"]=0;

$servername ="localhost";
$user_name="root";
$password="";
$db= "exam_portal";

$_SESSION["arr"]= array(0,0,0,0,0,0,0,0,0,0);
$_SESSION["timer"]=10;
$_SESSION["tmup"]=0;


$conn = mysqli_connect($servername,$user_name,$password,$db);

if(!$conn)
	die("Connection Failed".mysqli_connect_error());
else
	echo "Connection Successful"."<br>";
?>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email = $_POST["email"];
	$password= $_POST["passwd"];

	$sql = "SELECT Email,Password FROM Student
			WHERE Email= '$email' ";
	$result=mysqli_query($conn,$sql);


	if($result)
	{	echo "Query Successful";
		$row = mysqli_fetch_assoc($result);

		if($email ==$row["Email"] && $password ==$row["Password"])
		{
			//$_SESSION["flag"]=1;
			$_SESSION["mail_id"]= $email;
		echo '<script language="javascript">';
		echo 'alert("Login Successful")';
		echo '</script>';
		?>
		<!DOCTYPE HTML>
<html>
    <script type="text/javascript">
    //localStorage.clear();
     
    </script>
</html>
		<?php
		header("Location:try_qsn.php");
		
		//echo "<script>alert("Login Successful")</script>" ;
		}
		else
		{
			$_SESSION["flag"]=2;
		echo '<script language="javascript">';
		echo 'alert("Invalid Login")';
		echo '</script>';
		header("Location:sign_in.php");
		//echo "<script>alert("Invalid Login")</script>";
		}
	}
	else
		echo "NOT Successful";

	//echo $result["Email"]."<br>";
	//echo $result["Password"]."<br>";

}

?>